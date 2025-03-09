@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">All Categories</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="block group">
                <div class="bg-white rounded-lg shadow-md overflow-hidden relative h-64">
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No image</span>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                        <div class="p-4 w-full">
                            <h3 class="text-xl font-semibold text-white">{{ $category->name }}</h3>
                            <p class="text-gray-200">{{ $category->products_count }} products</p>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">No categories found</p>
            </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
