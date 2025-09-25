<?php

namespace App\Http\Controllers;

use App\Models\WishlistItem;
use Illuminate\Http\Request;

class WishlistItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = WishlistItem::all();
        return view('wishlist_items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wishlist_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'wishlist_id'=> 'required|exists:wishlists,id',
            'product_id' => 'required|exists:products,id',
        ]);

        WishlistItem::create($request->all());
        return redirect()->route('wishlist-items.index')->with('success', 'Wishlist item berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('wishlist_items.show', compact('wishlistItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('wishlist_items.edit', compact('wishlistItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WishlistItem $wishlistItem)
    {
        $request->validate([
            'wishlist_id'=> 'required|exists:wishlists,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlistItem->update($request->all());
        return redirect()->route('wishlist-items.index')->with('success', 'Wishlist item berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WishlistItem $wishlistItem)
    {
        $wishlistItem->delete();
        return redirect()->route('wishlist-items.index')->with('success', 'Wishlist item berhasil dihapus');
    }
}
