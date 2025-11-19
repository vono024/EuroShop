@extends('layouts.admin')

@section('title', 'Додати товар - Адмін-панель')

@section('content')
    <div class="max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Назад до товарів
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Додати новий товар</h1>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Назва товару *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Категорія *</label>
                    <select name="category_id" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Оберіть категорію</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Опис</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Ціна (₴) *</label>
                        <input type="number" name="price" value="{{ old('price') }}" min="0" step="0.01" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Кількість *</label>
                        <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Зображення</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-600 mt-1">Максимальний розмір: 2MB</p>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md">
                        Створити товар
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-lg hover:bg-gray-300 transition font-semibold text-center">
                        Скасувати
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
