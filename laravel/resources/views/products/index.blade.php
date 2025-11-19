@extends('layouts.app')

@section('title', 'Каталог товарів - EuroShop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Каталог товарів</h1>
            <p class="text-gray-600">Знайдіть найкращу техніку для себе</p>
        </div>

        <div class="mb-6 bg-white rounded-lg shadow-md p-4">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                <input type="text" name="search" placeholder="Пошук товарів..." value="{{ request('search') }}"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Всі категорії</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md whitespace-nowrap">
                    <span class="hidden sm:inline">Застосувати фільтр</span>
                    <span class="sm:hidden">Фільтр</span>
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
            @forelse($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-lg shadow-md p-12 text-center">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg mb-4">Товари не знайдено</p>
                        <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Показати всі товари
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
@endsection
