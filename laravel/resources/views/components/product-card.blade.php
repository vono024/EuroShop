@props(['product'])

<div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
    <div class="relative pb-48 overflow-hidden">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="absolute inset-0 h-full w-full object-cover">
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        @endif
        @if($product->stock == 0)
            <div class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                Немає в наявності
            </div>
        @elseif($product->stock < 5)
            <div class="absolute top-2 right-2 bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                Залишилось {{ $product->stock }}
            </div>
        @endif
    </div>
    <div class="p-4 sm:p-5">
        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-2">
            {{ $product->category->name }}
        </span>
        <h3 class="text-lg sm:text-xl font-bold mb-2 line-clamp-2 min-h-[3.5rem]">{{ $product->name }}</h3>
        <p class="text-gray-600 text-sm mb-3 line-clamp-2 min-h-[2.5rem]">{{ $product->description }}</p>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mt-4">
            <span class="text-2xl sm:text-3xl font-bold text-blue-600">{{ number_format($product->price, 0, ',', ' ') }} ₴</span>
            <div class="flex gap-2 w-full sm:w-auto">
                <a href="{{ route('products.show', $product->id) }}" class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition text-center text-sm font-medium">
                    Детальніше
                </a>
                @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1 sm:flex-none">
                        @csrf
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-blue-800 transition text-sm font-medium shadow-md">
                            В кошик
                        </button>
                    </form>
                @else
                    <button disabled class="flex-1 sm:flex-none bg-gray-300 text-gray-500 px-4 py-2 rounded-lg cursor-not-allowed text-sm font-medium">
                        Немає
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
