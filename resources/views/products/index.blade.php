@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative">
    <div class="bg-cover bg-center h-[250px]" style="background-image: url('https://images.unsplash.com/photo-1604719312566-8912e9227c6a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center relative z-10">
            <div>
                <h1 class="text-4xl font-bold text-white leading-tight mb-2 text-shadow">All Products</h1>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">
                                <i class="fas fa-home mr-2"></i> Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-300 mx-2"></i>
                                <span class="text-gray-100">Products</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filters and Sort -->
        <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">All Products</h2>
                <p class="text-gray-500 text-sm">Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products</p>
            </div>

            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                <div class="relative">
                    <select onchange="window.location.href = this.value" class="appearance-none bg-gray-50 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="{{ route('products.index') }}" {{ request()->has('category') ? '' : 'selected' }}>All Categories</option>
                        @foreach($categories as $category)
                        <option value="{{ route('products.index', ['category' => $category->slug]) }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <div class="relative">
                    <select onchange="window.location.href = this.value" class="appearance-none bg-gray-50 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'newest'])) }}" {{ request('sort') == 'newest' || !request('sort') ? 'selected' : '' }}>
                        Newest First
                        </option>
                        <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price-low'])) }}" {{ request('sort') == 'price-low' ? 'selected' : '' }}>
                        Price: Low to High
                        </option>
                        <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price-high'])) }}" {{ request('sort') == 'price-high' ? 'selected' : '' }}>
                        Price: High to Low
                        </option>
                        <option value="{{ route('products.index', array_merge(request()->query(), ['sort' => 'name'])) }}" {{ request('sort') == 'name' ? 'selected' : '' }}>
                        Name: A to Z
                        </option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            @forelse($products as $product)
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover-shadow hover-lift transition-300">
                <div class="relative">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    @else
                    <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-4xl text-gray-400"></i>
                    </div>
                    @endif

                    @if($product->featured)
                    <div class="absolute top-4 right-4">
                                    <span class="bg-gradient-to-r from-amber-500 to-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                        Featured
                                    </span>
                    </div>
                    @endif

                    <div class="absolute top-4 left-4">
                        <a href="{{ route('categories.show', $product->category->slug) }}" class="bg-black/60 hover:bg-black/80 text-white text-xs px-3 py-1 rounded-full transition-300">
                            {{ $product->category->name }}
                        </a>
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
                                    @if($product->stock > 10)
                                        <i class="fas fa-check-circle text-green-500 mr-1"></i> In stock
                                    @elseif($product->stock > 0)
                                        <i class="fas fa-exclamation-circle text-yellow-500 mr-1"></i> Low stock
                                    @else
                                        <i class="fas fa-times-circle text-red-500 mr-1"></i> Out of stock
                                    @endif
                                </span>
                    </div>

                    <a href="{{ route('products.show', $product->slug) }}" class="block w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white text-center py-3 rounded-lg transition duration-300 font-semibold">
                        View Details
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center">
                <div class="bg-gray-100 rounded-xl p-8 inline-block max-w-md">
                    <i class="fas fa-search text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No products found</h3>
                    <p class="text-gray-600 mb-4">We couldn't find any products matching your criteria.</p>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-300">
                        <i class="fas fa-redo-alt mr-2"></i> Clear filters
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
