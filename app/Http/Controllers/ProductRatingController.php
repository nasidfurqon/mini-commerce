<?php

namespace App\Http\Controllers;
use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = ProductRating::all();
        return view('product_ratings.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Page.Admin.Products.AddProduct',['']);  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id'    => 'required|exists:users,id',
            'rating'     => 'required|integer|min:1|max:5',
            'review'     => 'nullable|string',
        ]);

        ProductRating::create($request->all());
        return redirect()->route('product-ratings.index')->with('success', 'Rating berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('product_ratings.show', compact('productRating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('product_ratings.edit', compact('productRating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductRating $productRating)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id'    => 'required|exists:users,id',
            'rating'     => 'required|integer|min:1|max:5',
            'review'     => 'nullable|string',
        ]);

        $productRating->update($request->all());
        return redirect()->route('product-ratings.index')->with('success', 'Rating berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductRating $productRating)
    {
        $productRating->delete();
        return redirect()->route('product-ratings.index')->with('success', 'Rating berhasil dihapus');
    }
}
