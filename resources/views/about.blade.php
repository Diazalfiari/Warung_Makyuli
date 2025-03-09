@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative">
    <div class="bg-cover bg-center h-[300px]" style="background-image: url('https://images.unsplash.com/photo-1578916171728-46686eac8d58?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center relative z-10">
            <div>
                <h1 class="text-4xl font-bold text-white leading-tight mb-2 text-shadow">About Us</h1>
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
                                <span class="text-gray-100">About Us</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="bg-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12 text-center">
                <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full">Our Story</span>
                <h2 class="text-3xl font-bold text-gray-800 mt-2">Welcome to Warung Mak Yuli</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="prose prose-lg max-w-none">
                <p class="lead">Welcome to Warung Mak Yuli, your neighborhood convenience store that has been serving the local community since 2010. Our mission is to provide quality daily essentials at affordable prices with exceptional customer service.</p>

                <div class="my-10">
                    <img src="https://images.unsplash.com/photo-1578916171728-46686eac8d58?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80" alt="Our Store" class="w-full h-96 object-cover rounded-xl shadow-lg">
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-book-open text-green-500 mr-3"></i> Our Story
                </h3>
                <p>Warung Mak Yuli started as a small family business with a simple vision: to create a welcoming shopping experience where customers could find all their daily needs in one place. Over the years, we've grown and expanded our product offerings, but our commitment to quality and community has remained the same.</p>

                <h3 class="text-2xl font-bold text-gray-800 mb-4 mt-10 flex items-center">
                    <i class="fas fa-star text-green-500 mr-3"></i> Our Values
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
                    <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                        <div class="flex items-center mb-3">
                            <div class="bg-green-500 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">Quality</h4>
                        </div>
                        <p class="text-gray-600">We source only the best products for our customers, ensuring freshness and reliability.</p>
                    </div>

                    <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                        <div class="flex items-center mb-3">
                            <div class="bg-green-500 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-dollar-sign text-white"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">Affordability</h4>
                        </div>
                        <p class="text-gray-600">We believe that quality products should be accessible to everyone at fair prices.</p>
                    </div>

                    <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                        <div class="flex items-center mb-3">
                            <div class="bg-green-500 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">Community</h4>
                        </div>
                        <p class="text-gray-600">We're proud to be a part of the local community and strive to give back whenever possible.</p>
                    </div>

                    <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                        <div class="flex items-center mb-3">
                            <div class="bg-green-500 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-headset text-white"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">Customer Service</h4>
                        </div>
                        <p class="text-gray-600">We're dedicated to providing friendly, helpful service to all our customers.</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mb-4 mt-10 flex items-center">
                    <i class="fas fa-users text-green-500 mr-3"></i> Our Team
                </h3>
                <p>Our team consists of dedicated individuals who are passionate about providing the best shopping experience for our customers. From our store managers to our cashiers, everyone at Warung Mak Yuli is committed to our values and mission.</p>

                <div class="bg-gray-50 p-8 rounded-xl shadow-sm my-10">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-500 mr-3"></i> Visit Us
                    </h3>
                    <p>We invite you to visit our store and experience the Warung Mak Yuli difference. We're located at:</p>
                    <address class="mt-4 not-italic bg-white p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-building text-green-600 mr-3"></i>
                            <span class="font-semibold">Jl. Ciawi Tali Ciluluk 28</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="fas fa-map text-green-600 mr-3"></i>
                            <span>Cicalengka, Indonesia</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="fas fa-clock text-green-600 mr-3"></i>
                            <span>Open daily: 8:00 AM - 09:00 PM</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-green-600 mr-3"></i>
                            <span>+6282120808371</span>
                        </div>
                    </address>
                </div>

                <p>If you have any questions or feedback, please don't hesitate to <a href="mailto:diazalfiari15@gmail.com" class="text-green-600 hover:text-green-800 font-semibold">contact us</a>. We'd love to hear from you!</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<section class="py-16 bg-gradient-to-r from-green-600 to-emerald-700 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="md:w-2/3 mb-6 md:mb-0">
                <h2 class="text-3xl font-bold mb-4">Ready to shop with us?</h2>
                <p class="text-gray-100 text-lg">Browse our wide selection of products at great prices.</p>
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
