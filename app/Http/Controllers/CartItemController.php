<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = CartItem::all();
        return view('cart_items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cart_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cart_id'   => 'required|exists:carts,id',
            'product_id'=> 'required|exists:products,id',
            'quantity'  => 'required|integer|min:1',
        ]);

        CartItem::create($request->all());
        return redirect()->route('cart-items.index')->with('success', 'Item berhasil ditambahkan ke cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('cart_items.show', compact('cartItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('cart_items.edit', compact('cartItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'cart_id'   => 'required|exists:carts,id',
            'product_id'=> 'required|exists:products,id',
            'quantity'  => 'required|integer|min:1',
        ]);

        $cartItem->update($request->all());
        return redirect()->route('cart-items.index')->with('success', 'Cart item berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart-items.index')->with('success', 'Cart item berhasil dihapus');
    }
}
