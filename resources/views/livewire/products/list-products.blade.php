<div class="mx-4">
    <livewire:headers.header1
        text="{{ $category->name }}"
        aligned="left"
    />
    <livewire:headers.subheader1
        text="{{ $category->description }}"
        aligned="left"
    />

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 px-4 border bg-white">
        <div class="text-sm text-gray-700 py-4">
            Showing <span id="items-count">{{ $this->products->count() }} out of {{ $this->products->total() }}</span> items
        </div>

        <div class="flex flex-row justify-between items-center py-4">
            <label for="sort" class="text-sm font-medium text-gray-700">Sort by:</label>
            <select
                class="ml-2 p-2 w-48 border border-gray-300 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500"
                wire:change="updateOrder($event.target.value)"
            >
                <option value="newest">
                    Newest
                </option>
                <option value="lower_price">
                    Lower price
                </option>
                <option value="higher_price">
                    Higher price
                </option>
            </select>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row">
        <livewire:filters.general-filters />

        @if (!$this->category)
            <livewire:paragraphs.paragraph-standard
                text="Select the category to start browsing products."
                aligned="center"
                class="w-full"
            />
        @elseif ($this->products->isEmpty())
            <livewire:paragraphs.paragraph-standard
                text="No products found matching criteria.\Try using different filters."
                aligned="center"
                class="w-full"
            />
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:w-4/5 lg:ml-4">
                @foreach ($this->products as $product)
                    <livewire:products.product-card
                        wire:key="{{ $product->id }}"
                        :$product
                    />
                @endforeach
            </div>
        @endif
    </div>
    
    @if ($this->products->isNotEmpty() && $this->products->hasMorePages())
        <div class="text-center my-6">
            <livewire:buttons.action-button
                text="Load more products"
                actionEvent="load-more-products"
            />
        </div>
    @endif
</div>
