@extends('layouts.app')

@section('title', 'Кошик - EuroShop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8">Мій кошик</h1>

        @if(empty($cart))
            <div class="bg-white rounded-xl shadow-lg p-8 sm:p-12 text-center">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-gray-500 text-xl mb-6">Ваш кошик порожній</p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Повернутись до покупок
                </a>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900">Товар</th>
                            <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900">Ціна</th>
                            <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900">Кількість</th>
                            <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900">Сума</th>
                            <th class="px-4 sm:px-6 py-4"></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($cart as $id => $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 sm:px-6 py-4">
                                    <div class="flex items-center">
                                        @if($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg mr-4">
                                        @else
                                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        <span class="font-medium text-gray-900">{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 text-gray-900 font-semibold whitespace-nowrap">{{ number_format($item['price'], 0, ',', ' ') }} ₴</td>
                                <td class="px-4 sm:px-6 py-4">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                               class="w-16 sm:w-20 px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <button type="submit" class="text-blue-600 hover:text-blue-800 text-sm font-semibold whitespace-nowrap">Оновити</button>
                                    </form>
                                </td>
                                <td class="px-4 sm:px-6 py-4 font-bold text-blue-600 whitespace-nowrap">{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} ₴</td>
                                <td class="px-4 sm:px-6 py-4">
                                    <a href="{{ route('cart.remove', $id) }}" class="text-red-600 hover:text-red-800 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="border-t p-6 sm:p-8 bg-gray-50">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                        <span class="text-2xl sm:text-3xl font-bold text-gray-900">Загальна сума:</span>
                        <span class="text-3xl sm:text-4xl font-bold text-blue-600">{{ number_format($total, 0, ',', ' ') }} ₴</span>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full sm:w-auto bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition font-semibold shadow-md">
                                Очистити кошик
                            </button>
                        </form>

                        <a href="{{ route('products.index') }}" class="w-full sm:w-auto bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition font-semibold text-center">
                            Продовжити покупки
                        </a>

                        <a href="{{ route('orders.create') }}" class="w-full sm:w-auto bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-green-800 transition font-semibold shadow-md text-center ml-auto">
                            Оформити замовлення
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
