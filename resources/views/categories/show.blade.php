@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="container mx-auto px-6">
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative h-64">
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No image</span>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                        <div class="p-6 w-full">
                            <h1 class="text-3xl font-bold text-white mb-2">{{ $category->name }}</h1>
                            @if($category->description)
                            <p class="text-gray-200">{{ $category->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Products in {{ $category->name }}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover">
                @else
                <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No image</span>
                </div>
                @endif

                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-green-600 font-bold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-500">Stock: {{ $product->stock }}</span>
                    </div>
                    <a href="{{ route('products.show', $product->slug) }}" class="block w-full bg-green-600 hover:bg-green-700 text-white text-center py-2 rounded transition duration-300">View Details</a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">No products found in this category</p>
            </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
