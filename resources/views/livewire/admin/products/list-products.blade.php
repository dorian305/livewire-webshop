<div>
    <input
        type="search"
        wire:model.live="searchTerm"
        placeholder="Search for product title or description..."
        class="w-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mb-6"
    />

    @foreach ($this->products as $product)
        <div
            class="hover:bg-gray-50 p-4 border border-gray-200 mb-4 shadow-sm transition-colors duration-200"
            wire:key="{{ $product->id }}"
        >
            <div class="flex flex-col md:flex-row">
                @if ($product->image_url)
                    <livewire:images.image
                        url="{{ Storage::url($product->image_url) }}"
                        alt="{{ $product->title }}"
                        size="lg"
                        class="w-full md:w-48 h-auto object-cover"
                        wire:key="image-{{ $product->id }}"
                    />
                @endif
                <div class="flex flex-col flex-grow mt-4 md:mt-0 md:ml-6">
                    <div class="flex items-center justify-between">
                        <livewire:headers.header3
                            text="{!! htmlspecialchars($product->title, ENT_NOQUOTES, 'UTF-8') !!}"
                            aligned="left"
                            wire:key="title-{{ $product->id }}"
                        />
                        <livewire:links.normal-link
                            link="{{ route('view-product', ['product' => $product->id]) }}"
                            text="View product"
                            class="text-blue-600 hover:underline"
                            wire:key="view-product-{{ $product->id }}"
                        />
                    </div>
                    <livewire:paragraphs.paragraph-standard
                        text="{!! htmlspecialchars($product->description, ENT_NOQUOTES, 'UTF-8') !!}"
                        aligned="left"
                        class="mt-2 text-gray-700"
                        wire:key="description-{{ $product->id }}"
                    />
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 text-sm text-gray-600">
                        <livewire:paragraphs.paragraph-standard
                            text="Price: {{ $product->unit_price }}"
                            aligned="left"
                            wire:key="price-{{ $product->id }}"
                        />
                        <livewire:paragraphs.paragraph-standard
                            text="Unit: {{ $product->unit_measure }}"
                            aligned="left"
                            wire:key="unit_measure-{{ $product->id }}"
                        />
                        <livewire:paragraphs.paragraph-standard
                            text="Stock: {{ $product->stock_quantity }}"
                            aligned="left"
                            wire:key="stock-{{ $product->id }}"
                        />
                        <livewire:paragraphs.paragraph-standard
                            text="Category: {!! htmlspecialchars($product->category->name, ENT_NOQUOTES, 'UTF-8') !!}"
                            aligned="left"
                            wire:key="category-{{ $product->id }}"
                        />
                        <livewire:paragraphs.paragraph-standard
                            text="Created on: {{ $product->created_at->format('F j, Y') }}"
                            aligned="left"
                            wire:key="date-{{ $product->id }}"
                        />
                    </div>
                    <div class="mt-4 flex space-x-4">
                        <livewire:buttons.link-button
                            text="Edit"
                            link="{{ route('edit-product', $product->id) }}"
                            class="bg-blue-600 hover:bg-blue-500 text-white w-1/12"
                            wire:key="edit-{{ $product->id }}"
                        />
                        <livewire:buttons.action-button
                            text="Delete"
                            class="bg-red-600 hover:bg-red-500 text-white w-1/12"
                            actionEvent="productDeleted"
                            data="{
                                productId: {{ $product->id }},
                            }"
                            wire:key="delete-{{ $product->id }}"
                        />
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if ($this->products->isEmpty())
        <livewire:paragraphs.paragraph-standard
            text="No products to display."
            aligned="center"
        />
    @endif

    @if ($this->products->isNotEmpty() && $this->products->hasMorePages())
        <div class="text-center my-6">
            <livewire:buttons.action-button
                text="Load more products"
                actionEvent="load-more-products"
            />
        </div>
    @endif

    <div class="flex mt-4 justify-end">
        <livewire:buttons.link-button
            text="Add new product"
            link="{{ route('create-product') }}"
            class="bg-blue-600 text-white hover:bg-blue-500"
        />
    </div>
</div>