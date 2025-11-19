@extends('layouts.admin')

@section('title', 'Замовлення - Адмін-панель')

@section('content')
    <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Управління замовленнями</h1>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Клієнт</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Телефон</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Сума</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Статус</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Дата</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900">Дії</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @forelse($orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#{{ $order->id }}</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">{{ $order->customer_name }}</div>
                                @if($order->user)
                                    <div class="text-sm text-gray-600">ID: {{ $order->user->id }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $order->customer_email }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $order->customer_phone }}</td>
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
                            <td class="px-6 py-4 text-gray-600">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                    Переглянути
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-gray-500">
                                Замовлень поки немає
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
