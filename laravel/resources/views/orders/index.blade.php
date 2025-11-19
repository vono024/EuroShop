@extends('layouts.app')

@section('title', 'Мої замовлення - EuroShop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8">Мої замовлення</h1>

        @if($orders->isEmpty())
            <div class="bg-white rounded-xl shadow-lg p-8 sm:p-12 text-center">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-gray-500 text-xl mb-6">У вас ще немає замовлень</p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md">
                    Почати покупки
                </a>
            </div>
        @else
            <div class="space-y-4 sm:space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">
                        <div class="p-4 sm:p-6">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4">
                                <div>
                                    <h3 class="text-lg sm:text-xl font-bold text-gray-900">Замовлення #{{ $order->id }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                                </div>
                                <div class="flex items-center gap-4">
                            <span class="px-4 py-2 rounded-full text-sm font-semibold
                                @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status == 'completed') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800
                                @endif">
                                @if($order->status == 'pending') Очікує
                                @elseif($order->status == 'processing') В обробці
                                @elseif($order->status == 'completed') Виконано
                                @else Скасовано
                                @endif
                            </span>
                                </div>
                            </div>

                            <div class="border-t pt-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Замовник</p>
                                        <p class="font-semibold">{{ $order->customer_name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Email</p>
                                        <p class="font-semibold">{{ $order->customer_email }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Телефон</p>
                                        <p class="font-semibold">{{ $order->customer_phone }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Загальна сума</p>
                                        <p class="font-bold text-blue-600 text-xl">{{ number_format($order->total, 0, ',', ' ') }} ₴</p>
                                    </div>
                                </div>

                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                    <p class="text-sm text-gray-600">Товарів: {{ $order->items->count() }}</p>
                                    <a href="{{ route('orders.show', $order->id) }}" class="w-full sm:w-auto bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold text-center">
                                        Детальніше
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection
