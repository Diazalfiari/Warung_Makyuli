@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative">
    <div class="bg-cover bg-center h-[600px] sm:h-[500px] md:h-[550px] lg:h-[600px]" style="background-image: url('https://images.unsplash.com/photo-1604719312566-8912e9227c6a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center relative z-10">
            <div class="max-w-lg">
                <span class="inline-block bg-green-600 text-white text-sm font-semibold px-3 py-1 rounded-full mb-4">Welcome to Our Store</span>
                <h1 class="text-4xl sm:text-5xl font-bold text-white leading-tight mb-4 text-shadow">Warung Mak Yuli Daily Essentials</h1>
                <p class="text-xl text-gray-200 mb-8">Your one-stop shop for all your daily needs. Fresh, affordable, and always available.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('products.index') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-lg hover:shadow-xl flex items-center">
                        <i class="fas fa-shopping-basket mr-2"></i> Browse Products
                    </a>
                    <a href="{{ route('about') }}" class="bg-white hover:bg-gray-100 text-gray-800 font-bold py-3 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg flex items-center">
                        <i class="fas fa-info-circle mr-2"></i> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full mb-2">Our Selection</span>
            <h2 class="text-3xl font-bold text-gray-800">Featured Products</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover-shadow hover-lift transition-300">
                <div class="relative">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    @else
                    <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-4xl text-gray-400"></i>
                    </div>
                    @endif

                    <div class="absolute top-4 right-4">
                        <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">Featured</span>
                    </div>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-bold text-gray-800">{{ $product->name }}</h3>
                        <span class="font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>

                    <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-gray-500 flex items-center">
                                    <i class="fas fa-box mr-1"></i>
                                    @if($product->stock > 0)
                                        {{ $product->stock }} in stock
                                    @else
                                        Out of stock
                                    @endif
                                </span>
                        <span class="text-xs text-blue-600 hover:text-blue-800 hover:underline">
                                    <a href="{{ route('categories.show', $product->category->slug) }}">{{ $product->category->name }}</a>
                                </span>
                    </div>

                    <a href="{{ route('products.show', $product->slug) }}" class="block w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white text-center py-3 rounded-lg transition duration-300 font-semibold">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white font-semibold rounded-lg transition-300">
                View All Products <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Categories Preview Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full mb-2">Browse By</span>
            <h2 class="text-3xl font-bold text-gray-800">Shop by Category</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="block group hover-lift">
                <div class="bg-white rounded-xl shadow-md overflow-hidden relative h-64">
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                        <i class="fas fa-th-large text-4xl text-gray-400"></i>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex items-end">
                        <div class="p-6 w-full">
                            <h3 class="text-xl font-bold text-white text-shadow">{{ $category->name }}</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-gray-200 text-sm">{{ $category->products_count }} products</span>
                                <i class="fas fa-arrow-right ml-2 text-green-400 group-hover:translate-x-2 transition-transform duration-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('categories.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white font-semibold rounded-lg transition-300">
                View All Categories <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Product Features Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full mb-2">Our Services</span>
            <h2 class="text-3xl font-bold text-gray-800">Why Shop With Us</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md hover-shadow text-center hover-lift transition-300">
                <div class="bg-gradient-to-r from-green-400 to-emerald-500 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-truck-fast text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Fast Delivery</h3>
                <p class="text-gray-600">Get your products delivered to your doorstep quickly and efficiently within the same day.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover-shadow text-center hover-lift transition-300">
                <div class="bg-gradient-to-r from-green-400 to-emerald-500 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-medal text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Quality Products</h3>
                <p class="text-gray-600">We ensure all our products meet the highest quality standards for your satisfaction.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover-shadow text-center hover-lift transition-300">
                <div class="bg-gradient-to-r from-green-400 to-emerald-500 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-wallet text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Secure Payments</h3>
                <p class="text-gray-600">Multiple secure payment options for your convenience and safety when shopping.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-gradient-to-r from-green-600 to-emerald-700 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="md:w-2/3 mb-6 md:mb-0">
                <h2 class="text-3xl font-bold mb-4">Ready to experience our service?</h2>
                <p class="text-gray-100 text-lg">Join thousands of satisfied customers shopping with us every day.</p>
            </div>
            <div class="md:w-1/3 text-center md:text-right">
                <a href="{{ route('products.index') }}" class="inline-block bg-white text-green-600 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg transition duration-300 shadow-lg">
                    <i class="fas fa-shopping-basket mr-2"></i> Start Shopping
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
