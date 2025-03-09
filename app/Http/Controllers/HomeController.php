<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', true)->with('category')->limit(8)->get();
        $categories = Category::with('products')->limit(4)->get();

        return view('home', compact('featuredProducts', 'categories'));
    }

    public function about()
    {
        return view('about');
    }
}
