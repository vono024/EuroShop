@extends('layouts.app')

@section('title', $product->name . ' - EuroShop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('products.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Назад до каталогу
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 sm:p-8">
                <div>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-md">
                    @else
                        <div class="w-full aspect-square bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                            <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <div>
                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full mb-4 font-semibold">
                    {{ $product->category->name }}
                </span>
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-700 mb-6 leading-relaxed">{{ $product->description }}</p>

                    <div class="mb-6 pb-6 border-b">
                        <span class="text-4xl sm:text-5xl font-bold text-blue-600">{{ number_format($product->price, 0, ',', ' ') }} ₴</span>
                    </div>

                    <div class="mb-8">
                        @if($product->stock > 0)
                            <div class="flex items-center text-green-600 mb-2">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-semibold">В наявності: {{ $product->stock }} шт.</span>
                            </div>
                        @else
                            <div class="flex items-center text-red-600 mb-2">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-semibold">Немає в наявності</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        @if($product->stock > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 rounded-lg hover:from-blue-700 hover:to-blue-800 transition text-lg font-bold shadow-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Додати в кошик
                                </button>
                            </form>
                        @else
                            <button disabled class="flex-1 bg-gray-300 text-gray-500 py-4 rounded-lg cursor-not-allowed text-lg font-bold">
                                Немає в наявності
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
