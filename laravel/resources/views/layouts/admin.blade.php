<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Адмін-панель - EuroShop')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="flex h-screen overflow-hidden">
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-800 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="flex items-center justify-between p-6 border-b border-gray-700">
            <h2 class="text-xl font-bold">EuroShop Admin</h2>
            <button id="close-sidebar" class="lg:hidden text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                Головна
            </a>
            <a href="{{ route('admin.products.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 transition {{ request()->routeIs('admin.products.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                </svg>
                Товари
            </a>
            <a href="{{ route('admin.orders.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 transition {{ request()->routeIs('admin.orders.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
                Замовлення
            </a>
            <div class="border-t border-gray-700 mt-6 pt-6">
                <a href="{{ route('products.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 transition">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                    До магазину
                </a>
                <form action="{{ route('logout') }}" method="POST" class="px-6 py-3">
                    @csrf
                    <button type="submit" class="flex items-center w-full text-left hover:text-gray-300 transition">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                        </svg>
                        Вийти
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col lg:ml-64">
        <header class="bg-white shadow-sm lg:hidden">
            <div class="flex items-center justify-between p-4">
                <button id="open-sidebar" class="text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">EuroShop Admin</h1>
                <div class="w-6"></div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-md mb-6">
                    <div class="flex">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="ml-3 text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md mb-6">
                    <div class="flex">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <p class="ml-3 text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const openBtn = document.getElementById('open-sidebar');
    const closeBtn = document.getElementById('close-sidebar');

    openBtn?.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    });

    closeBtn?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });

    overlay?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
</script>
</body>
</html>
