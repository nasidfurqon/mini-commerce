<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    private $views = 'Page.Cart';
    public function index()
    {
        $carts = Cart::all();
        return view($this->views . '.Index', compact('carts'));
    }

    
    public function preview()
    {
        return view('carts.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }
            return redirect()->route('auth.page');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'nullable|integer|min:1'
        ]);

        $userId = Auth::id();
        $productId = (int) $request->input('product_id');
        $qty = max(1, (int) $request->input('qty', 1));

        $cart = DB::table('carts')->where('user_id', $userId)->first();
        if (!$cart) {
            $cartId = DB::table('carts')->insertGetId([
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $cartId = $cart->id;
        }

        $cartItem = DB::table('cart_items')
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            DB::table('cart_items')->where('id', $cartItem->id)->update([
                'qty' => $cartItem->qty + $qty,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('cart_items')->insert([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'qty' => $qty,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $cartCount = (int) DB::table('cart_items')->where('cart_id', $cartId)->sum('qty');

        if ($request->ajax() || $request->wantsJson()) {
            $html = view('Partial.Cart-Preview')->render();
            return response()->json(['html' => $html, 'count' => $cartCount]);
        }

        return back()->with('success', 'Product added to cart.');
    }

    public function show(string $id)
    {
        return view('carts.show', compact('cart'));
    }

    public function edit(string $id)
    {
        return view('carts.edit', compact('cart'));
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
        'user_id' => 'required|exists:users,id',
        ]);

        $cart->update($request->all());
        return redirect()->route('carts.index')->with('success', 'Cart berhasil diupdate');
    }

    public function destroy(Cart $cart)
    {
         $cart->delete();
        return redirect()->route('carts.index')->with('success', 'Cart berhasil dihapus');
    }
}
