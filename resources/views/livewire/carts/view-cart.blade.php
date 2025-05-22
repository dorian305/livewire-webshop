<div class="container mx-auto p-4">
    <h2 class="text-3xl font-extrabold text-gray-900 mb-6 px-4">Shopping Cart</h2>

    <div class="p-4">
        @if (!$cart)
            <div class="text-center py-10 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mx-auto h-16 w-16 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                </svg>

                <h3 class="mt-2 text-lg font-medium text-gray-900">You do not have a cart</h3>
                <p class="mt-1 text-sm text-gray-500">Explore our products and add items to your cart.</p>
                <div class="mt-6">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">Browse
                        Products</a>
                </div>
            </div>
        @elseif ($cart && $cart->products->isEmpty())
            <div class="text-center py-10 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mx-auto h-16 w-16 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">
                    Your cart is empty
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Browse our categories and discover our best deals!
                </p>
                <div class="mt-6">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                        Start Shopping
                    </a>
                </div>
            </div>
        @else
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Cart product list -->
                <div class="md:w-2/3">
                    <div class="p-4 bg-white">
                        @foreach ($cart->products as $product)
                            <div
                                class="hover:bg-gray-100 p-2 border-b"
                                wire:key="cart-product-{{ $product->id }}" class="mb-4 border-b pb-4"
                            >
                                <!-- Remove from cart button -->
                                <div class="text-right">
                                    <button 
                                        title="Remove from cart"
                                        class="p-2 text-sm text-gray-600 hover:underline focus:outline-none"
                                        wire:click="$dispatch('remove-from-cart-event', { productId: {{ $product->id }} })"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5" 
                                            stroke="currentColor"
                                            class="size-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                            />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex">
                                    <!-- Product image -->
                                    <img 
                                        src="{{ asset($product->image_url) }}"
                                        alt="{{ $product->title }}"
                                        class="h-16 w-16 object-cover"
                                    >
                                    <!-- Product details and quantity controls -->
                                    <div class="flex flex-col flex-grow ml-4">
                                        <h3 class="text-md font-medium text-gray-900 mb-3">
                                            {{ $product->title }}
                                        </h3>
                                        <p>
                                            {{ $product->description }}
                                        </p>
                                        <div class="flex items-center">
                                            <button
                                                class="bg-gray-200 text-gray-700 p-1 rounded-l"
                                                wire:click="$dispatch('decrease-quantity-event', { productId: {{ $product->id }} })"
                                            >
                                                −
                                            </button>
                                            <span class="py-1 px-5 bg-gray-100">
                                                {{ $product->pivot->quantity }}
                                            </span>
                                            <button
                                                class="bg-gray-200 text-gray-700 p-1 rounded-r"
                                                wire:click="$dispatch('increase-quantity-event', { productId: {{ $product->id }} })"
                                            >
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Price section aligned bottom right -->
                                    <div class="flex flex-col justify-end items-end">
                                        <span class="font-semibold">
                                            Price: {{ $product->pivot->quantity * $product->unit_price }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right: Order Summary -->
                <div class="md:w-1/3">
                    <div class="bg-white p-4 h-full">
                        <h3 class="text-xl font-bold mb-4">
                            Order Summary
                        </h3>
                        <div class="flex justify-between mb-2">
                            <span>Total Items:</span>
                            <span>{{ $cart->products->sum('pivot.quantity') }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <span>Total Price:</span>
                            <span>
                                {{ $cart->products->sum(fn ($product): float => $product->pivot->quantity * $product->unit_price) }}
                            </span>
                        </div>
                        <a
                            href="{{ route('checkout') }}"
                            class="block text-center px-4 py-2 bg-blue-600 text-white hover:bg-blue-700"
                            wire:navigate
                        >
                            Go to checkout
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>