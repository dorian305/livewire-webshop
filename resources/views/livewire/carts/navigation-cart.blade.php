<div
    class="relative inline-block"
    x-data="{
        openCart: false,

        toggleCartView() {
            this.openCart = !this.openCart;
        },
    }"
    @keydown.escape.window="openCart = false"
>
    <button
        type="button"
        class="flex items-center justify-center p-2 rounded-md bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
        @click="toggleCartView()"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6 text-gray-700"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
            />
        </svg>
    </button>

    @if ($cart && $cart->products->isNotEmpty())
        <span class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-blue-600 rounded-full">
            {{ $cart->products->count() }}
        </span>
    @endif

    <!-- Cart dropdown -->
    <div
        x-show="openCart"
        x-cloak
        @click.away="openCart = false"
        class="absolute right-0 top-full mt-2 w-96 bg-white border border-gray-200 rounded-lg shadow-lg z-50 overflow-hidden"
    >
        <div class="p-4 max-h-96 overflow-y-auto border-b">
            @if ($cart && $cart->products->isNotEmpty())
                <div>
                    <livewire:headers.header3 text="Added to cart:" />
                    @foreach ($cart->products as $product)
                        <div
                            class="hover:bg-gray-100 p-2 border"
                            wire:key="cart-product-{{ $product->id }}"
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
                                <livewire:images.image
                                    url="{{ $product->image_url }}"
                                    alt="{{ $product->title }}"
                                    size="xs"
                                    class="p-1"
                                />

                                <div class="flex flex-col flex-grow ml-4">
                                    <span class="mb-4">
                                        {{ $product->title }}
                                    </span>
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

                                <div class="flex flex-col justify-end items-end">
                                    <span>
                                        Price: {{ $product->pivot->quantity * $product->unit_price }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 py-4">
                    Your cart is empty
                </p>
            @endif

            @if ($cart && $cart->products->isNotEmpty())
                <span class="font-semibold my-2">
                    Your total is: {{ $cart->products->sum(fn (\App\Models\Product $product): float => $product->pivot->quantity * $product->unit_price) }}
                </span>

                <div class="m-2">
                    <a 
                        href="{{ route('view-cart') }}" 
                        wire:navigate
                        class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                    >
                        View Cart
                    </a>
                </div>
                <div class="m-2">
                    <a 
                        href="{{ route('checkout') }}" 
                        wire:navigate
                        class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                    >
                        Go to checkout
                    </a>
                </div>
            @endif
        </div>
    </div>

</div>