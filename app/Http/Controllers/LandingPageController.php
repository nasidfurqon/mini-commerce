<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class LandingPageController extends Controller
{
    public function index() {
        $user = Auth::user();
        $categories = Category::all();
        $newProducts = Product::where('is_active',true)->orderBy('created_at','desc')->limit(5)->get();
        $products = Product::where('is_active',true)->orderBy('created_at','desc')->paginate(16);
        return view('Page.Home',
                    compact('user','categories','products','newProducts')
                    );
    }
    public function shop($category = 'all') {
        $categories = Category::all();
        $sortBy = request('sort', '');
        $search = request('search', '');
        $all = Product::count();
        $query = Product::where('is_active', true);
        
        // Apply search filter if search keyword exists
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }
        
        if ($category == 'all') {
            $productsCount = $query->count();
        } else {
            // Cari kategori berdasarkan nama
            $categoryModel = Category::where('name', $category)->first();
            if ($categoryModel) {    
                $query->where('category_id', $categoryModel->id);
                $productsCount = $query->count();
            } else {
                // Jika kategori tidak ditemukan, redirect ke all
                return redirect()->route('shop', 'all');
            }
        }
        
        // Apply sorting
        switch ($sortBy) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        $products = $query->paginate(24);
        
        // Jika request AJAX, return JSON
        if (request()->ajax()) {
            return response()->json([
                'products' => $products->items(),
                'pagination' => [
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total(),
                    'has_more_pages' => $products->hasMorePages(),
                    'on_first_page' => $products->onFirstPage(),
                    'prev_page_url' => $products->previousPageUrl(),
                    'next_page_url' => $products->nextPageUrl(),
                    'links' => $products->getUrlRange(1, $products->lastPage())
                ]
            ]);
        }
        
        return view('Page.Shop',compact('categories','products','category','productsCount','all'));
    }

    public function detail($id) {
        $products = Product::where('is_active',true)->orderBy('created_at','desc')->paginate(10);
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('is_active',true)
                                    ->where('category_id',$product->category_id)
                                    ->where('id','!=',$id)
                                    ->orderBy('created_at','desc')
                                    ->paginate(10);        
        return view('Page.Product-Detail',compact('product','products','relatedProducts'));
    }


    public function wishlist() {
        // $user = Auth::user();
        // $wishlists = $user->wishlists;
        return view('Page.Wishlist.Index');
    }
        
    public function checkout() {
        // Pastikan selalu menggunakan logika CartController untuk menyediakan $items dan $subTotal
        return redirect()->route('user.checkout.index');
    }
}
