@extends('layouts.app')

@section('title', 'Оформлення замовлення - EuroShop')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8">Оформлення замовлення</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
                <h2 class="text-2xl font-bold mb-6">Контактні дані</h2>

                <form action="{{ route('orders.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Ім'я та прізвище *</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name', Auth::user()->name ?? '') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('customer_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email *</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email', Auth::user()->email ?? '') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('customer_email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Телефон *</label>
                        <input type="tel" name="customer_phone" value="{{ old('customer_phone') }}" required
                               placeholder="+380 XX XXX XX XX"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('customer_phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Адреса доставки *</label>
                        <textarea name="customer_address" rows="3" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('customer_address') }}</textarea>
                        @error('customer_address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-4 rounded-lg hover:from-green-700 hover:to-green-800 transition font-bold text-lg shadow-lg">
                        Підтвердити замовлення
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
                <h2 class="text-2xl font-bold mb-6">Ваше замовлення</h2>

                <div class="space-y-4 mb-6">
                    @foreach($cart as $id => $item)
                        <div class="flex items-center gap-4 pb-4 border-b">
                            @if($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">{{ $item['name'] }}</h3>
                                <p class="text-sm text-gray-600">{{ $item['quantity'] }} × {{ number_format($item['price'], 0, ',', ' ') }} ₴</p>
                            </div>
                            <span class="font-bold text-blue-600">{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} ₴</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t pt-6">
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-2xl font-bold text-gray-900">До сплати:</span>
                        <span class="text-3xl font-bold text-blue-600">{{ number_format($total, 0, ',', ' ') }} ₴</span>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <p class="text-sm text-blue-800">
                            <strong>Оплата при отриманні.</strong> Після оформлення замовлення з вами зв'яжеться менеджер для підтвердження.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
