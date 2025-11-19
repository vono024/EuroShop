<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EuroShop - Магазин технологій')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
<nav class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('products.index') }}" class="text-2xl font-bold text-white flex items-center">
                    <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                    </svg>
                    EuroShop
                </a>
                <div class="hidden md:flex ml-10 space-x-4">
                    <a href="{{ route('products.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition">Товари</a>
                    @auth
                        <a href="{{ route('orders.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition">Мої замовлення</a>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md transition">Адмін-панель</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('cart.index') }}" class="text-white hover:bg-blue-700 p-2 rounded-md relative transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">
                                {{ count(session('cart')) }}
                            </span>
                    @endif
                </a>
                @auth
                    <div class="relative group">
                        <button class="flex items-center text-white hover:bg-blue-700 px-3 py-2 rounded-md transition">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Вийти</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md transition">Увійти</a>
                    <a href="{{ route('register') }}" class="bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-gray-100 font-semibold transition">Реєстрація</a>
                @endauth
            </div>

            <div class="md:hidden flex items-center">
                <a href="{{ route('cart.index') }}" class="text-white hover:bg-blue-700 p-2 rounded-md relative mr-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">
                                {{ count(session('cart')) }}
                            </span>
                    @endif
                </a>
                <button id="mobile-menu-btn" class="text-white hover:bg-blue-700 p-2 rounded-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-blue-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('products.index') }}" class="block text-white hover:bg-blue-600 px-3 py-2 rounded-md">Товари</a>
            @auth
                <a href="{{ route('orders.index') }}" class="block text-white hover:bg-blue-600 px-3 py-2 rounded-md">Мої замовлення</a>
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="block text-white hover:bg-blue-600 px-3 py-2 rounded-md">Адмін-панель</a>
                @endif
                <div class="border-t border-blue-600 pt-2">
                    <div class="px-3 py-2 text-white font-semibold">{{ Auth::user()->name }}</div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left text-white hover:bg-blue-600 px-3 py-2 rounded-md">Вийти</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="block text-white hover:bg-blue-600 px-3 py-2 rounded-md">Увійти</a>
                <a href="{{ route('register') }}" class="block bg-white text-blue-600 px-3 py-2 rounded-md font-semibold text-center">Реєстрація</a>
            @endauth
        </div>
    </div>
</nav>

@if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-md">
            <div class="flex">
                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <p class="ml-3 text-green-700">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md">
            <div class="flex">
                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <p class="ml-3 text-red-700">{{ session('error') }}</p>
            </div>
        </div>
    </div>
@endif

<main class="py-6 sm:py-8 lg:py-12">
    @yield('content')
</main>

<footer class="bg-gray-900 text-white mt-12 sm:mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-bold mb-4">EuroShop</h3>
                <p class="text-gray-400">Найкращий магазин технологій в Україні</p>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Навігація</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Товари</a></li>
                    @auth
                        <li><a href="{{ route('orders.index') }}" class="text-gray-400 hover:text-white">Замовлення</a></li>
                    @endauth
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Контакти</h4>
                <ul class="space-y-2 text-gray-400">
                    <li>Email: info@euroshop.com</li>
                    <li>Тел: +380 (XX) XXX-XX-XX</li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Соціальні мережі</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 EuroShop. Всі права захищені.</p>
        </div>
    </div>
</footer>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
