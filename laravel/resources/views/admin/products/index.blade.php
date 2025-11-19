@extends('layouts.admin')

@section('title', 'Товари - Адмін-панель')

@section('content')
    <div>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Управління товарами</h1>
            <a href="{{ route('admin.products.create') }}" class="w-full sm:w-auto bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md text-center">
                + Додати товар
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Зображення</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Назва</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Категорія</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Ціна</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Залишок</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900">Дії</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $product->id }}</td>
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">{{ $product->name }}</div>
                                <div class="text-sm text-gray-600">{{ Str::limit($product->description, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 font-semibold text-blue-600">{{ number_format($product->price, 0, ',', ' ') }} ₴</td>
                            <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->stock > 5 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $product->stock }} шт
                            </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Ви впевнені?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                Товарів поки немає
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
