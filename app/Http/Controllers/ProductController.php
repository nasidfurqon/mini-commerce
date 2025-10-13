<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('Page.Admin.Products.ListProduct', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('Page.Admin.Products.AddProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable',
        ]);

        $data = $request->only(['name','description','price','stock','category_id','image']);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = 'storage/'.$path;
        }

        $product = Product::create($data);
        return redirect()->route('admin.products.index', $product->category_id)->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('Page.Admin.Products.Show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('Page.Admin.Products.Edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable',
        ]);

        $data = $request->only(['name','description','price','stock','category_id','image']);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = 'storage/'.$path;
        } else {
            // Jika tidak ada file dan field image kosong, jangan override gambar yang ada
            if (empty($data['image'])) {
                unset($data['image']);
            }
        }

        $product->update($data);
        return redirect()->route('admin.products.index', $product->category_id)->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index', $product->category_id)->with('success', 'Produk berhasil dihapus');
    }

    public function detail($id) {
        $product = Product::findOrFail($id);
        return view('Page.Admin.Products.DetailProduct', compact('product'));
    }
}
