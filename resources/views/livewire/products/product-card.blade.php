<div class="bg-white overflow-hidden border flex flex-col">
    <livewire:images.image
        url="{{ Storage::url($product->image_url) }}"
        alt="{{ $product->title }}"
        size="lg"
        class="mx-auto p-2"
    />

    <div class="p-4 flex flex-col flex-grow">
        <div class="flex flex-row justify-between items-center">
            <livewire:headers.header3
                text="{!! htmlspecialchars($product->title, ENT_NOQUOTES, 'UTF-8') !!}"
                aligned="left"
            />

            <livewire:links.normal-link
                text="View product"
                link="products/{{ $product->id }}"
            />
        </div>

        <livewire:paragraphs.paragraph-standard
            text="{{ $product->description }}"
            aligned="left"
        />

        <div class="py-4 flex flex-row justify-between items-center">
            <span>
                ${{ $product->unit_price }} / {{ $product->unit_measure }}
            </span>

            <p class="text-sm text-gray-500">
                @php
                    $stockQuantity = $product->stock_quantity;
                    $outOfStock = $stockQuantity === 0;
                @endphp
                @if ($outOfStock)
                    <span class="text-red-500">
                        Out of stock!
                    </span>
                @elseif ($stockQuantity < 10)
                    <span class="text-yellow-500">
                        Only <strong>{{ $stockQuantity }}</strong> more available
                    </span>
                @else
                    <span>
                        In stock: <strong>{{ $stockQuantity }}</strong>
                    </span>
                @endif
            </p>
        </div>

        @auth
            <livewire:buttons.action-button
                text="{{ $outOfStock ? 'Out of stock' : 'Add to cart' }}"
                actionEvent="add-to-cart"
                data="{
                    productId: {{ $product->id }},
                }"
            />
        @endauth
    </div>
</div>