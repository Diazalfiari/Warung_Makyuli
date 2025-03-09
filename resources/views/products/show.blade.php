@extends('layouts.app')

@section('content')
<!-- Breadcrumb Navigation -->
<div class="bg-gray-50 py-4">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-green-600">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-sm"></i>
                        <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-green-600">
                            Products
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-sm"></i>
                        <a href="{{ route('categories.show', $product->category->slug) }}" class="text-gray-600 hover:text-green-600">
                            {{ $product->category->name }}
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-sm"></i>
                        <span class="text-gray-500">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="md:flex">
                <!-- Product Image with Gallery -->
                <div class="md:w-1/2 p-6">
                    <div class="aspect-square rounded-xl overflow-hidden mb-4">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-5xl text-gray-400"></i>
                        </div>
                        @endif
                    </div>

                    <!-- Thumbnail images could be added here in the future -->
                </div>

                <!-- Product Information -->
                <div class="p-6 md:p-8 md:w-1/2">
                    <div class="mb-4">
                        <div class="flex items-center mb-2">
                            <a href="{{ route('categories.show', $product->category->slug) }}" class="text-sm text-green-600 hover:text-green-800 bg-green-50 px-3 py-1 rounded-full">
                                <i class="fas fa-tag mr-1"></i> {{ $product->category->name }}
                            </a>

                            @if($product->featured)
                            <span class="ml-2 text-sm text-amber-700 bg-amber-50 px-3 py-1 rounded-full">
                                        <i class="fas fa-star mr-1"></i> Featured
                                    </span>
                            @endif
                        </div>

                        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>

                        <div class="flex items-center mb-4">
                            <div class="bg-green-50 px-3 py-1 rounded-md">
                                <p class="text-2xl font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
                            <div class="text-gray-600 prose">
                                @if($product->description)
                                {{ $product->description }}
                                @else
                                <p class="text-gray-400 italic">No description available.</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-8">
                            <div class="flex items-center">
                                <span class="text-gray-800 mr-2 font-medium">Availability:</span>
                                @if($product->stock > 10)
                                <span class="px-3 py-1 inline-flex items-center text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i> In Stock ({{ $product->stock }})
                                        </span>
                                @elseif($product->stock > 0)
                                <span class="px-3 py-1 inline-flex items-center text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-exclamation-circle mr-1"></i> Low Stock ({{ $product->stock }} left)
                                        </span>
                                @else
                                <span class="px-3 py-1 inline-flex items-center text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i> Out of Stock
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Note: You would implement actual shopping cart functionality here -->
                            <button type="button" class="block w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white text-center py-4 rounded-lg font-semibold transition duration-300 flex items-center justify-center">
                                <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                            </button>

                            <button type="button" class="block w-full bg-white border-2 border-gray-300 hover:bg-gray-50 text-gray-800 text-center py-3 rounded-lg font-semibold transition duration-300 flex items-center justify-center">
                                <i class="far fa-heart mr-2"></i> Add to Wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Related Products</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover-shadow hover-lift transition-300">
                    <a href="{{ route('products.show', $relatedProduct->slug) }}">
                        @if($relatedProduct->image)
                        <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover">
                        @else
                        <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-3xl text-gray-400"></i>
                        </div>
                        @endif
                    </a>

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $relatedProduct->name }}</h3>
                        <p class="text-green-600 font-bold mb-4">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $relatedProduct->slug) }}" class="block w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white text-center py-2 rounded-lg transition duration-300 text-sm font-medium">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
