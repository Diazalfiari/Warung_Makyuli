<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - {{ config('app.name', 'Warung Kelontong') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .transition-300 {
            transition: all 0.3s ease;
        }
        .sidebar-link {
            @apply flex items-center text-gray-300 py-3 px-4 rounded-lg transition-all duration-200;
        }
        .sidebar-link.active {
            @apply bg-gradient-to-r from-green-700/70 to-emerald-700/70 text-white font-medium;
        }
        .sidebar-link:not(.active):hover {
            @apply bg-gray-700/50 text-white;
        }
        .sidebar-icon {
            @apply text-lg w-6 text-center mr-3;
        }
        [x-cloak] {
            display: none !important;
        }
        .sidebar-scroll {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.1) transparent;
        }
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
<div x-data="{ sidebarOpen: window.innerWidth >= 768 }" class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div
        x-cloak
        :class="{'md:translate-x-0 translate-x-0': sidebarOpen, '-translate-x-full md:translate-x-0': !sidebarOpen}"
        class="fixed md:relative inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-gray-900 to-gray-800 transform transition-transform duration-300 ease-in-out flex flex-col h-full shadow-xl"
    >
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between h-16 px-5 bg-gray-950/30">
            <div class="flex items-center">
                    <span class="text-xl font-bold text-white">
                        <i class="fas fa-store mr-2"></i>
                        Warung Kelontong
                    </span>
            </div>
            <button
                @click="sidebarOpen = false"
                class="md:hidden p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none"
            >
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- User Info -->
        <div class="px-5 py-4 border-b border-gray-700">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-md flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="mt-3 flex text-xs">
                <span class="px-2 py-1 bg-green-500/20 text-green-400 rounded-md">Administrator</span>
            </div>
        </div>

            <!-- Navigation Links -->
            <div class="overflow-y-auto flex-grow px-3 py-4 space-y-1 sidebar-scroll">
                <a href="{{ route('dashboard.index') }}" class="sidebar-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt sidebar-icon text-emerald-400"></i>
                    <span class="truncate text-emerald-300">Dashboard</span>
                </a>

                <!-- Products Dropdown -->
                <div x-data="{ open: {{ request()->routeIs('dashboard.products.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" type="button" class="sidebar-link w-full text-left {{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-basket sidebar-icon text-blue-400"></i>
                        <span class="flex-1 truncate text-blue-300">Products</span>
                        <i class="fas fa-chevron-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-cloak class="mt-1 pl-10 space-y-1">
                        <a href="{{ route('dashboard.products.index') }}" class="block py-2 pl-3 pr-4 text-sm text-blue-300 hover:text-white rounded-md hover:bg-gray-700/30 {{ request()->routeIs('dashboard.products.index') ? 'text-white bg-gray-700/30' : '' }}">
                            <i class="fas fa-list-ul mr-2"></i> All Products
                        </a>
                        <a href="{{ route('dashboard.products.create') }}" class="block py-2 pl-3 pr-4 text-sm text-blue-300 hover:text-white rounded-md hover:bg-gray-700/30 {{ request()->routeIs('dashboard.products.create') ? 'text-white bg-gray-700/30' : '' }}">
                            <i class="fas fa-plus mr-2"></i> Add Product
                        </a>
                    </div>
                </div>

                <!-- Categories Dropdown -->
                <div x-data="{ open: {{ request()->routeIs('dashboard.categories.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" type="button" class="sidebar-link w-full text-left {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
                        <i class="fas fa-th-large sidebar-icon text-purple-400"></i>
                        <span class="flex-1 truncate text-purple-300">Categories</span>
                        <i class="fas fa-chevron-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-cloak class="mt-1 pl-10 space-y-1">
                        <a href="{{ route('dashboard.categories.index') }}" class="block py-2 pl-3 pr-4 text-sm text-purple-300 hover:text-white rounded-md hover:bg-gray-700/30 {{ request()->routeIs('dashboard.categories.index') ? 'text-white bg-gray-700/30' : '' }}">
                            <i class="fas fa-list-ul mr-2"></i> All Categories
                        </a>
                        <a href="{{ route('dashboard.categories.create') }}" class="block py-2 pl-3 pr-4 text-sm text-purple-300 hover:text-white rounded-md hover:bg-gray-700/30 {{ request()->routeIs('dashboard.categories.create') ? 'text-white bg-gray-700/30' : '' }}">
                            <i class="fas fa-plus mr-2"></i> Add Category
                        </a>
                    </div>
                </div>

                <div class="pt-4 mt-4 border-t border-gray-700">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <i class="fas fa-home sidebar-icon text-amber-400"></i>
                        <span class="text-amber-300">View Website</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="sidebar-link">
                        <i class="fas fa-user-cog sidebar-icon text-cyan-400"></i>
                        <span class="text-cyan-300">My Profile</span>
                    </a>
                </div>
            </div>

        <!-- Sidebar Footer -->
        <div class="p-4 mt-auto border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-left text-gray-300 hover:text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </button>
            </form>
            <div class="mt-4 text-xs text-gray-500 text-center">
                <p>Warung Kelontong &copy; {{ date('Y') }}</p>
                <p class="mt-1">v1.0.0</p>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top header -->
        <header class="bg-white shadow-sm z-10">
            <div class="px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <!-- Mobile menu button -->
                <button
                    @click="sidebarOpen = !sidebarOpen"
                    class="text-gray-600 focus:outline-none"
                >
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <h1 class="text-xl font-semibold text-gray-800 sm:ml-4">@yield('title', 'Dashboard')</h1>

                <div class="flex items-center space-x-4">
                    <!-- Current Date/Time -->
                    <div class="hidden md:flex items-center text-gray-600 text-sm">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span id="current-time">{{ now()->format('d M Y, H:i') }}</span>
                    </div>

                    <!-- Profile dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-green-600 focus:outline-none">
                            <span class="hidden md:block">{{ Auth::user()->name }}</span>
                            <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-md flex items-center justify-center text-white">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </button>

                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-cloak
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                        >
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-500 hover:text-white">
                                <i class="fas fa-user-circle mr-2"></i> Your Profile
                            </a>
                            <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-500 hover:text-white">
                                <i class="fas fa-cog mr-2"></i> Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-100 mt-1">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-500 hover:text-white">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main content -->
        <main class="flex-1 overflow-y-auto bg-gray-50 p-4 md:p-6">
            <!-- Flash Messages -->
            @if(session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                    <button class="ml-auto text-green-600 hover:text-green-800 focus:outline-none" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                    <button class="ml-auto text-red-600 hover:text-red-800 focus:outline-none" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
    // Update time every minute
    function updateTime() {
        const now = new Date();
        const options = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' };
        document.getElementById('current-time').textContent = now.toLocaleDateString('en-GB', options).replace(',', '');
    }

    setInterval(updateTime, 60000);
    updateTime();
</script>
</body>
</html>
