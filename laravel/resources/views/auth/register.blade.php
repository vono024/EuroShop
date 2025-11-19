@extends('layouts.app')

@section('title', 'Реєстрація - EuroShop')

@section('content')
    <div class="max-w-md mx-auto px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                    </svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Реєстрація</h2>
                <p class="text-gray-600 mt-2">Створіть новий акаунт</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Ім'я</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Пароль</label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Підтвердження паролю</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md">
                    Зареєструватись
                </button>
            </form>

            <p class="text-center mt-6 text-gray-600">
                Вже є акаунт? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Увійти</a>
            </p>
        </div>
    </div>
@endsection
