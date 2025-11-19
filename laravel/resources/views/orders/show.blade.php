@extends('layouts.app')

@section('title', 'Замовлення #' . $order->id . ' - EuroShop')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('orders.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Назад до замовлень
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 pb-6 border-b">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Замовлення #{{ $order->id }}</h1>
                    <p class="text-gray-600 mt-1">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                </div>
                <span class="px-6 py-3 rounded-full text-sm font-bold
                @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                @elseif($order->status == 'completed') bg-green-100 text-green-800
                @else bg-red-100 text-red-800
                @endif">
                @if($order->status == 'pending') Очікує обробки
                    @elseif($order->status == 'processing') В обробці
                    @elseif($order->status == 'completed') Виконано
                    @else Скасовано
                    @endif
            </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <div>
                    <h3 class="font-bold text-gray-900 mb-3">Контактна інформація</h3>
                    <div class="space-y-2">
                        <div>
                            <p class="text-sm text-gray-600">Ім'я</p>
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
                    </div>
                </div>

                <div>
                    <h3 class="font-bold text-gray-900 mb-3">Адреса доставки</h3>
                    <p class="text-gray-700">{{ $order->customer_address }}</p>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="font-bold text-gray-900 mb-4">Товари в замовленні</h3>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex items-center gap-4 pb-4 border-b last:border-0">
                            @if($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded-lg">
                            @else
                                <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">{{ $item->product->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $item->quantity }} × {{ number_format($item->price, 0, ',', ' ') }} ₴</p>
                            </div>
                            <span class="font-bold text-blue-600 text-lg">{{ number_format($item->price * $item->quantity, 0, ',', ' ') }} ₴</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="border-t pt-6">
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-gray-900">Загальна сума:</span>
                    <span class="text-3xl font-bold text-blue-600">{{ number_format($order->total, 0, ',', ' ') }} ₴</span>
                </div>
            </div>
        </div>
    </div>
@endsection
