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
    public function decrementItem(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $request->validate([
            'cart_item_id' => 'required|integer|exists:cart_items,id',
        ]);

        $cartItemId = (int) $request->input('cart_item_id');

        // ensure the cart_item belongs to current user's cart
        $cartItem = DB::table('cart_items')->where('id', $cartItemId)->first();
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        $cart = DB::table('carts')->where('id', $cartItem->cart_id)->first();
        if (!$cart || $cart->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // decrement qty or delete
        if ($cartItem->qty > 1) {
            DB::table('cart_items')->where('id', $cartItemId)->update([
                'qty' => $cartItem->qty - 1,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('cart_items')->where('id', $cartItemId)->delete();
        }

        // recompute cart count (sum qty) and return updated preview
        $cartId = $cartItem->cart_id;
        $cartCount = (int) DB::table('cart_items')->where('cart_id', $cartId)->sum('qty');

        $html = view('Partial.Cart-Preview')->render();

        return response()->json(['html' => $html, 'count' => $cartCount]);
    }

    /**
     * Remove cart item completely.
     */
    public function removeItem(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $request->validate([
            'cart_item_id' => 'required|integer|exists:cart_items,id',
        ]);

        $cartItemId = (int) $request->input('cart_item_id');

        $cartItem = DB::table('cart_items')->where('id', $cartItemId)->first();
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        $cart = DB::table('carts')->where('id', $cartItem->cart_id)->first();
        if (!$cart || $cart->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        DB::table('cart_items')->where('id', $cartItemId)->delete();

        $cartCount = (int) DB::table('cart_items')->where('cart_id', $cart->id)->sum('qty');

        $html = view('Partial.Cart-Preview')->render();

        return response()->json(['html' => $html, 'count' => $cartCount]);
    }

    public function destroy(Cart $cart)
    {
         $cart->delete();
        return redirect()->route('carts.index')->with('success', 'Cart berhasil dihapus');
    }
}
