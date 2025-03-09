<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        // Get counts for statistics
        $productsCount = Product::count();
        $categoriesCount = Category::count();

        // Get latest products for display
        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        // Get featured products
        $featuredProducts = Product::with('category')
            ->where('featured', true)
            ->latest()
            ->take(5)
            ->get();

        // Get all categories with product counts
        $categories = Category::withCount('products')
            ->orderByDesc('products_count')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'productsCount',
            'categoriesCount',
            'latestProducts',
            'featuredProducts',
            'categories'
        ));
    }
}
