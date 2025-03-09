<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Warung Mak Yuli') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Alpine.js (Using CDN for guaranteed loading) -->
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .transition-300 {
            transition: all 0.3s ease;
        }
        .hover-lift {
            transition: transform 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
        }
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .hover-shadow:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
<header class="bg-white shadow-sm sticky top-0 z-50">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="text-2xl font-bold bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">Warung Mak Yuli</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 transition-300 {{ request()->routeIs('home') ? 'font-medium text-green-600 border-b-2 border-green-500' : '' }}">
                    <span class="flex items-center"><i class="fas fa-home mr-2"></i> Home</span>
                </a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-green-600 transition-300 {{ request()->routeIs('products.*') ? 'font-medium text-green-600 border-b-2 border-green-500' : '' }}">
                    <span class="flex items-center"><i class="fas fa-shopping-basket mr-2"></i> Products</span>
                </a>
                <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-green-600 transition-300 {{ request()->routeIs('categories.*') ? 'font-medium text-green-600 border-b-2 border-green-500' : '' }}">
                    <span class="flex items-center"><i class="fas fa-th-large mr-2"></i> Categories</span>
                </a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-600 transition-300 {{ request()->routeIs('about') ? 'font-medium text-green-600 border-b-2 border-green-500' : '' }}">
                    <span class="flex items-center"><i class="fas fa-info-circle mr-2"></i> About Us</span>
                </a>
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                @guest
                <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center text-gray-700 hover:text-green-600 transition-300">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-lg hover:shadow-lg transition-300">
                    <i class="fas fa-user-plus mr-2"></i> Register
                </a>
                @else
                <div x-data="{ open: false }">
                    <button @click="open = !open" type="button" class="flex items-center space-x-2 text-gray-700 hover:text-green-600 focus:outline-none">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center text-white">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="hidden sm:inline-block">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-cloak x-show="open"
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl z-50 py-1">
                        @if(Auth::user()->isAdmin())
                        <a href="{{ route('dashboard.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-green-500 hover:text-white">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-green-500 hover:text-white">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center px-4 py-2 text-left text-sm text-gray-700 hover:bg-green-500 hover:text-white">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
                @endguest

                <!-- Mobile Menu Button -->
                <div x-data="{ mobileMenuOpen: false }">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Mobile Navigation -->
                    <div x-cloak x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden absolute left-0 right-0 top-full bg-white shadow-md mt-2 z-40 border-t border-gray-100">
                        <div class="px-2 pt-2 pb-3 space-y-1">
                            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-green-50 text-green-600' : 'text-gray-700' }}">
                                <i class="fas fa-home mr-2"></i> Home
                            </a>
                            <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('products.*') ? 'bg-green-50 text-green-600' : 'text-gray-700' }}">
                                <i class="fas fa-shopping-basket mr-2"></i> Products
                            </a>
                            <a href="{{ route('categories.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('categories.*') ? 'bg-green-50 text-green-600' : 'text-gray-700' }}">
                                <i class="fas fa-th-large mr-2"></i> Categories
                            </a>
                            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'bg-green-50 text-green-600' : 'text-gray-700' }}">
                                <i class="fas fa-info-circle mr-2"></i> About Us
                            </a>
                            @guest
                            <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-green-500 text-white mt-2 p-2">
                                <i class="fas fa-user-plus mr-2"></i> Register
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<main>
    @if(session('error'))
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    </div>
    @endif

    @yield('content')
</main>


<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 flex items-center">
                    <span class="bg-gradient-to-r from-green-400 to-emerald-500 bg-clip-text text-transparent">Warung Kelontong</span>
                </h3>
                <p class="text-gray-400 mb-4">Your one-stop shop for all daily essentials. Fresh, affordable, and always available.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-300">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-300">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-300">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4 text-gray-200">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-green-400 transition-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs"></i> Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-green-400 transition-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs"></i> Products</a></li>
                    <li><a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-green-400 transition-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs"></i> Categories</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-green-400 transition-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs"></i> About Us</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4 text-gray-200">Contact Us</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-green-400"></i>
                        <span class="text-gray-400">Jl. Ciawi Tali Ciluluk 28, Cicalengka, Indonesia</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt mr-3 text-green-400"></i>
                        <span class="text-gray-400">+6282120808371</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 text-green-400"></i>
                        <span class="text-gray-400">diazalfiari15@gmail.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock mr-3 text-green-400"></i>
                        <span class="text-gray-400">Open daily: 8:00 AM - 09:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Warung Mak Yuli. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('alpine:init', () => {
        console.log('Alpine.js initialized successfully');
    });
</script>
</body>
</html>
