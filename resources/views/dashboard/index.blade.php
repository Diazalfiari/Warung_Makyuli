@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Welcome Section -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h1>
    <p class="text-gray-600 mt-1">Here's what's happening with your store today.</p>
</div>

<!-- Dashboard Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-300">
        <div class="p-6">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 w-14 h-14 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-shopping-basket text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Products</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ number_format($productsCount) }}</p>
                </div>
            </div>
            <div class="flex items-center justify-between mt-6 text-sm">
                <a href="{{ route('dashboard.products.index') }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
                    <span>View Products</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <span class="text-xs text-gray-500">Updated: {{ now()->format('d M Y') }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-300">
        <div class="p-6">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 w-14 h-14 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-th-large text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Categories</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ number_format($categoriesCount) }}</p>
                </div>
            </div>
            <div class="flex items-center justify-between mt-6 text-sm">
                <a href="{{ route('dashboard.categories.index') }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                    <span>View Categories</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <span class="text-xs text-gray-500">Updated: {{ now()->format('d M Y') }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-300">
        <div class="p-6">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 w-14 h-14 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-star text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Featured</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $featuredProducts->count() }}</p>
                </div>
            </div>
            <div class="flex items-center justify-between mt-6 text-sm">
                    <span class="text-purple-600 font-medium flex items-center">
                        <span>Featured Products</span>
                    </span>
                <span class="text-xs text-gray-500">Updated: {{ now()->format('d M Y') }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-300">
        <div class="p-6">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 w-14 h-14 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Date & Time</p>
                    <p class="text-lg font-bold text-gray-800 mt-1">{{ now()->format('d M Y') }}</p>
                    <p class="text-sm text-gray-500">{{ now()->format('H:i') }} WIB</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="mb-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Quick Actions</h2>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <a href="{{ route('dashboard.products.create') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-300 text-center flex flex-col items-center">
            <div class="bg-green-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-plus text-green-600 text-xl"></i>
            </div>
            <span class="text-sm font-medium text-gray-800">Add New Product</span>
        </a>

        <a href="{{ route('dashboard.categories.create') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-300 text-center flex flex-col items-center">
            <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-folder-plus text-blue-600 text-xl"></i>
            </div>
            <span class="text-sm font-medium text-gray-800">Add New Category</span>
        </a>

        <a href="{{ route('dashboard.products.index') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-300 text-center flex flex-col items-center">
            <div class="bg-purple-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-list text-purple-600 text-xl"></i>
            </div>
            <span class="text-sm font-medium text-gray-800">Manage Products</span>
        </a>

        <a href="{{ route('dashboard.categories.index') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-300 text-center flex flex-col items-center">
            <div class="bg-amber-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-tags text-amber-600 text-xl"></i>
            </div>
            <span class="text-sm font-medium text-gray-800">Manage Categories</span>
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
    <!-- Latest Products -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                <i class="fas fa-shopping-basket text-green-500 mr-2"></i> Latest Products
            </h2>
            <a href="{{ route('dashboard.products.index') }}" class="text-sm text-green-600 hover:text-green-800 font-medium flex items-center">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse($latestProducts as $product)
            <div class="p-5 hover:bg-gray-50 transition-colors duration-150">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-14 h-14 object-cover rounded-lg mr-4">
                        @else
                        <div class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                        @endif
                        <div>
                            <h3 class="font-medium text-gray-800">{{ $product->name }}</h3>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <span class="text-green-600 font-medium">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $product->category->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        @if($product->stock > 0)
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">In Stock</span>
                        @else
                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Out of Stock</span>
                        @endif
                        <a href="{{ route('dashboard.products.edit', $product) }}" class="text-gray-400 hover:text-blue-600">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="p-6 text-center text-gray-500">
                <i class="fas fa-info-circle mb-2 text-2xl"></i>
                <p>No products found. Add your first product now!</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Category Overview -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                <i class="fas fa-th-large text-blue-500 mr-2"></i> Category Overview
            </h2>
            <a href="{{ route('dashboard.categories.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse($categories as $category)
            <div class="p-5 hover:bg-gray-50 transition-colors duration-150">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-12 h-12 object-cover rounded-lg mr-4">
                        @else
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-folder text-blue-500"></i>
                        </div>
                        @endif
                        <span class="font-medium text-gray-800">{{ $category->name }}</span>
                    </div>
                    <div class="flex items-center">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                    {{ $category->products_count }} products
                                </span>
                        <a href="{{ route('dashboard.categories.edit', $category) }}" class="ml-3 text-gray-400 hover:text-blue-600">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="p-6 text-center text-gray-500">
                <i class="fas fa-info-circle mb-2 text-2xl"></i>
                <p>No categories found. Create your first category now!</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 mb-10">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h2 class="text-lg font-bold text-gray-800 flex items-center">
            <i class="fas fa-star text-amber-500 mr-2"></i> Featured Products
        </h2>
        <a href="{{ route('dashboard.products.index') }}?featured=1" class="text-sm text-amber-600 hover:text-amber-800 font-medium flex items-center">
            Manage Featured <i class="fas fa-cog ml-1"></i>
        </a>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($featuredProducts as $product)
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-300">
                <div class="relative">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                    @else
                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-3xl text-gray-400"></i>
                    </div>
                    @endif
                    <div class="absolute top-2 right-2">
                        <span class="bg-amber-500 text-white text-xs px-2 py-1 rounded-full">Featured</span>
                    </div>
                </div>

                <div class="p-4">
                    <h3 class="font-medium text-gray-800 mb-1">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ Str::limit($product->description, 60) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <a href="{{ route('dashboard.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 p-8 text-center bg-gray-50 rounded-lg">
                <i class="fas fa-star text-gray-300 text-4xl mb-4"></i>
                <h3 class="text-lg font-medium text-gray-700 mb-2">No Featured Products Yet</h3>
                <p class="text-gray-500 mb-4">Highlight your best products by marking them as featured</p>
                <a href="{{ route('dashboard.products.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-300">
                    <i class="fas fa-plus mr-2"></i> Add Featured Products
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Store Overview -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-lg font-bold text-gray-800 flex items-center">
            <i class="fas fa-store text-purple-500 mr-2"></i> Store Overview
        </h2>
    </div>
    <div class="p-6">
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl overflow-hidden">
            <div class="p-8 text-white">
                <h3 class="text-2xl font-bold mb-2">Warung Kelontong Dashboard</h3>
                <p class="text-purple-100 mb-6">Manage your products, categories and more from this central dashboard.</p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-purple-100">Total Products</p>
                        <p class="text-2xl font-bold">{{ number_format($productsCount) }}</p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-purple-100">Categories</p>
                        <p class="text-2xl font-bold">{{ number_format($categoriesCount) }}</p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-purple-100">Featured</p>
                        <p class="text-2xl font-bold">{{ $featuredProducts->count() }}</p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-sm text-purple-100">Latest Update</p>
                        <p class="text-xl font-bold">{{ now()->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
            <a href="{{ route('home') }}" class="flex items-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-home text-green-600"></i>
                </div>
                <div>
                    <h4 class="text-gray-800 font-medium">View Website</h4>
                    <p class="text-gray-500 text-sm">See how your store looks to customers</p>
                </div>
                <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
            </a>

            <a href="{{ route('profile.edit') }}" class="flex items-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <i class="fas fa-user-cog text-blue-600"></i>
                </div>
                <div>
                    <h4 class="text-gray-800 font-medium">Edit Profile</h4>
                    <p class="text-gray-500 text-sm">Update your account information</p>
                </div>
                <i class="fas fa-arrow-right ml-auto text-gray-400"></i>
            </a>
        </div>
    </div>
</div>
@endsection
