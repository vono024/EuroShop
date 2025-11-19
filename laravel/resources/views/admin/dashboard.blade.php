@extends('layouts.admin')

@section('title', 'Головна - Адмін-панель')

@section('content')
    <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Панель управління</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-1">Всього замовлень</p>
                        <p class="text-3xl font-bold">{{ $totalOrders }}</p>
                    </div>
                    <svg class="w-12 h-12 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium mb-1">Товарів</p>
                        <p class="text-3xl font-bold">{{ $totalProducts }}</p>
                    </div>
                    <svg class="w-12 h-12 text-green-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium mb-1">Користувачів</p>
                        <p class="text-3xl font-bold">{{ $totalUsers }}</p>
                    </div>
                    <svg class="w-12 h-12 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-yellow-100 text-sm font-medium mb-1">Очікують</p>
                        <p class="text-3xl font-bold">{{ $pendingOrders }}</p>
                    </div>
                    <svg class="w-12 h-12 text-yellow-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Останні замовлення</h2>

            @if($recentOrders->isEmpty())
                <p class="text-gray-500 text-center py-8">Замовлень поки немає</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">#</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Клієнт</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Сума</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Статус</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Дата</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($recentOrders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">#{{ $order->id }}</td>
                                <td class="px-6 py-4">{{ $order->customer_name }}</td>
                                <td class="px-6 py-4 font-semibold text-blue-600">{{ number_format($order->total, 0, ',', ' ') }} ₴</td>
                                <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
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
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $order->created_at->format('d.m.Y') }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                        Переглянути
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
