<div class="max-w-4xl mx-auto p-6 bg-white">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <livewire:images.image
                url="{{ Storage::url($product->image_url) }}"
                alt="{{ $product->title }}"
                size="xl"
                class="mx-autoo"
            />
        </div>

        <div class="md:w-1/2 md:pl-6 mt-4 md:mt-0 flex flex-col">
            <div>
                <livewire:headers.header3
                    text="{!! htmlspecialchars($product->title, ENT_NOQUOTES, 'UTF-8') !!}"
                    aligned="left"
                />
                <livewire:paragraphs.paragraph-standard
                    text="{{ $product->description }}"
                    aligned="left"
                />
            </div>

            <div class="flex flex-col">
                @php
                    $stockQuantity = $product->stock_quantity;
                    $outOfStock = $stockQuantity === 0;
                @endphp

                <div class="py-4 flex flex-row justify-between items-center">
                    <span>
                        ${{ $product->unit_price }} / {{ $product->unit_measure }}
                    </span>

                    <p class="text-sm text-gray-500">
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
                    @if ($outOfStock)
                     <livewire:buttons.action-button-disabled text="Out of stock" />
                    @else
                        <livewire:buttons.action-button
                            text="Add to cart"
                            actionEvent="add-to-cart"
                            data="{
                                productId: {{ $product->id }},
                            }"
                        />
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
