<div class="bg-white border mb-4 p-4 lg:mb-0 lg:w-1/5">
    <livewire:headers.header3
        text="Filter results:"
        aligned="left"
    />

    <div class="mb-4 border-b py-4">
        <label class="block text-gray-700 font-medium mb-2">Price:</label>
        <div class="flex space-x-2">
            <input
                type="number"
                placeholder="Min"
                class="w-1/2 p-2 border border-gray-300 rounded"
                wire:model.live="minPrice"
                value=""
            >
            <input
                type="number"
                placeholder="Max"
                class="w-1/2 p-2 border border-gray-300 rounded"
                wire:model.live="maxPrice"
            >
        </div>
    </div>

    <div class="mb-4 border-b py-4">
        <label class="block text-gray-700 font-medium mb-2">Only show products in stock</label>
            <input
                id="in-stock"
                type="checkbox"
                class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                wire:model.live="inStock"
            />
            <span class="ml-2 text-gray-700 font-medium">In stock</span>
        </label>
    </div>

    <livewire:buttons.action-button
        text="Clear filters"
        actionEvent="clear-filters"
        class="w-full"
    />
</div>
