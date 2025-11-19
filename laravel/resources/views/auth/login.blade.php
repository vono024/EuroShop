@extends('layouts.app')

@section('title', 'Вхід - EuroShop')

@section('content')
    <div class="max-w-md mx-auto px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Вхід</h2>
                <p class="text-gray-600 mt-2">Увійдіть до свого акаунту</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

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

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-gray-700">Запам'ятати мене</label>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md">
                    Увійти
                </button>
            </form>

            <p class="text-center mt-6 text-gray-600">
                Немає акаунту? <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-semibold">Зареєструватись</a>
            </p>
        </div>
    </div>
@endsection
