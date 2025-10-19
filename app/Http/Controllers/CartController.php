<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;
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
        // decrement / hapus
        if ($cartItem->qty <= 1) {
            return response()->json([
                'error' => 'Minimal kuantitas 1',
                'cart_item_id' => $cartItem->id,
                'qty' => $cartItem->qty,
                ], 422);
        }

        // kalau lebih dari 1, baru dikurangi
        $newQty = $cartItem->qty - 1;
        DB::table('cart_items')->where('id', $cartItemId)->update([
            'qty' => $newQty,
            'updated_at' => now(),
        ]);

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


    public function storeOnCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
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
            $newQty = $cartItem->qty + $qty;
        } else {
            $cartItemId = DB::table('cart_items')->insertGetId([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'qty' => $qty,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $cartItem = DB::table('cart_items')->where('id', $cartItemId)->first();
            $newQty = $qty;
        }

        // ambil harga produk
        $product = DB::table('products')->where('id', $productId)->first();
        $price = (float) $product->price;

        // hitung ulang subtotal seluruh cart
        $subTotal = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->where('cart_items.cart_id', $cartId)
            ->sum(DB::raw('cart_items.qty * products.price'));

        $cartCount = (int) DB::table('cart_items')->where('cart_id', $cartId)->sum('qty');

        return response()->json([
            'updated_item' => [
                'cart_item_id' => $cartItem->id,
                'qty' => $newQty,
                'price' => $price,
            ],
            'subtotal' => $subTotal,
            'count' => $cartCount,
        ]);
    }

    public function decrementItemOnCart(Request $request)
    {
        if (!Auth::check()) return response()->json(['error' => 'Unauthenticated'], 401);

        $request->validate(['cart_item_id' => 'required|integer|exists:cart_items,id']);
        $cartItemId = (int) $request->input('cart_item_id');

        $cartItem = DB::table('cart_items')->where('id', $cartItemId)->first();
        if (!$cartItem) return response()->json(['error' => 'Cart item not found'], 404);

        $cart = DB::table('carts')->where('id', $cartItem->cart_id)->first();
        if (!$cart || $cart->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // ambil harga produk
        $product = DB::table('products')->where('id', $cartItem->product_id)->first();
        $price = (float) $product->price;

        // decrement / hapus
        if ($cartItem->qty <= 1) {
            return response()->json([
                'error' => 'Minimal kuantitas 1',
                'cart_item_id' => $cartItem->id,
                'qty' => $cartItem->qty,
                'price' => $price,
                ], 422);
        }

        // kalau lebih dari 1, baru dikurangi
        $newQty = $cartItem->qty - 1;
        DB::table('cart_items')->where('id', $cartItemId)->update([
            'qty' => $newQty,
            'updated_at' => now(),
        ]);


        // subtotal seluruh cart
        $subTotal = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->where('cart_items.cart_id', $cart->id)
            ->sum(DB::raw('cart_items.qty * products.price'));

        $cartCount = (int) DB::table('cart_items')->where('cart_id', $cart->id)->sum('qty');

        return response()->json([
            'updated_item' => [
                'cart_item_id' => $cartItem->id,
                'qty' => $newQty,
                'price' => $price,
            ],
            'subtotal' => $subTotal,
            'count' => $cartCount,
        ]);
    }

    public function removeItemOnCart(Request $request)
    {
        if (!Auth::check()) return response()->json(['error' => 'Unauthenticated'], 401);

        $request->validate(['cart_item_id' => 'required|integer|exists:cart_items,id']);
        $cartItemId = (int) $request->input('cart_item_id');

        $cartItem = DB::table('cart_items')->where('id', $cartItemId)->first();
        if (!$cartItem) return response()->json(['error' => 'Cart item not found'], 404);

        $cart = DB::table('carts')->where('id', $cartItem->cart_id)->first();
        if (!$cart || $cart->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        DB::table('cart_items')->where('id', $cartItemId)->delete();

        $subTotal = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->where('cart_items.cart_id', $cart->id)
            ->sum(DB::raw('cart_items.qty * products.price'));

        $cartCount = (int) DB::table('cart_items')->where('cart_id', $cart->id)->sum('qty');

        return response()->json([
            'removed_item_id' => $cartItemId,
            'subtotal' => $subTotal,
            'count' => $cartCount,
        ]);
    }

    public function destroy(Cart $cart)
    {
         $cart->delete();
        return redirect()->route('carts.index')->with('success', 'Cart berhasil dihapus');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = DB::table('carts')->where('user_id', Auth::id())->first();
        if (!$cart) {
            $items = collect();
            $subTotal = 0;
        } else {
            $items = DB::table('cart_items')
                ->where('cart_items.cart_id', $cart->id)
                ->join('products', 'cart_items.product_id', '=', 'products.id')
                ->select('cart_items.id as cart_item_id','products.id','products.name','products.image','products.price','cart_items.qty')
                ->get();

            if ($items->isEmpty()) {
                return redirect()->route('user.cart.index')->with('error', 'Keranjang belanja Anda kosong.');
            }
            $subTotal = $items->reduce(function ($carry, $item) {
                return $carry + ($item->price * $item->qty);
            }, 0);
        }

        return view('Page.Checkout.index', compact('items', 'subTotal'));
    }

    /**
     * Place order: validate address, create order + order_items, clear cart items.
     */
    public function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'address' => 'required|string|max:1000',
        ]);

        $userId = Auth::id();

        // load cart and items
        $cart = DB::table('carts')->where('user_id', $userId)->first();
        if (!$cart) {
            return redirect()->route('user.cart.index')->with('error', 'Cart is empty.');
        }

        $items = DB::table('cart_items')
        ->where('cart_items.cart_id', $cart->id)
        ->join('products', 'cart_items.product_id', '=', 'products.id')
        ->select(
            'cart_items.id as cart_item_id',
            'products.id as product_id',
            'products.name',
            'products.price',
            'products.stock as product_qty',
            'cart_items.qty as order_qty'
        )
        ->get();

        if ($items->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Cart is empty.');
        }

        // compute totals
        $subTotal = $items->reduce(function ($carry, $item) {
            return $carry + ($item->price * $item->order_qty);
        }, 0);

        $ecoTax = max(0, $subTotal * 0.02);
        $vat = $subTotal * 0.20;
        $total = $subTotal + $ecoTax + $vat;    

        // transaction: create order and order_items, then clear cart_items
        DB::beginTransaction();
            try {
                foreach ($items as $item) {
                if ($item->product_qty < $item->order_qty) {
                    return redirect()->route('user.cart.index')->with('error', 'Failed to place order.');
                    throw new \Exception("Stok produk '{$item->name}' tidak mencukupi. Stok tersedia: {$item->product_qty}, diminta: {$item->order_qty}");
                }
            }

            $orderId = DB::table('orders')->insertGetId([
                'user_id' => $userId,
                'adress_text' => $data['address'],
                'total' => $total,
                'status' => 'diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($items as $it) {
                DB::table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $it->product_id,
                    'price' => $it->price,
                    'qty' => $it->order_qty,
                    'subtotal' => ($it->price * $it->order_qty),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // clear cart items
            DB::table('products')
                ->where('id', $item->product_id)
                ->decrement('stock', $item->order_qty);
            DB::table('cart_items')->where('cart_id', $cart->id)->delete();

            DB::commit();
            return redirect()->route('user.cart.index')->with('success', 'Pesanan berhasil dibuat! Order ID: ' . $orderId);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Place Order Failed: ' . $e->getMessage());
            return redirect()->route('user.cart.index')->with('error', 'Failed to place order.');
        }
    }
}
