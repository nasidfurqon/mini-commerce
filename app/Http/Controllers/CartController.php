<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('carts.index', compact('carts'));
    }

    public function create()
    {
        return view('carts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        Cart::create($request->all());
        return redirect()->route('carts.index')->with('success', 'Cart berhasil dibuat');
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
