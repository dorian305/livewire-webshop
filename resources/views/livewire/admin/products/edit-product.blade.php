<div class="">
    <livewire:headers.header1
        text="Editing product"
        aligned="center"
    />

    <form class="mt-8 space-y-6">
        @if (session('updated'))
            <div class="bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 10-1.414 1.414L9 13.414l4.707-4.707z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('updated') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if ($product->image_url)
            <livewire:paragraphs.paragraph-standard
                text="Current image:"
                aligned="left"
            />
            <livewire:images.image
                url="{{ Storage::url($product->image_url) }}"
                alt="{{ $product->title }}"
                size="lg"
                wire:key="{{ now() }}"
            />
            <livewire:buttons.action-button
                text="Delete image"
                actionEvent="deleteProductImage"
            />
        @endif

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input
                id="image"
                type="file"
                wire:model="image"
                class="mt-1 block w-full text-sm text-gray-700"
            />
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($image)
                <div class="mt-4">
                    <p class="text-xs text-gray-500 mb-2">Image Preview:</p>
                    <img 
                        src="{{ $image->temporaryUrl() }}" 
                        alt="Image Preview" 
                        class="max-h-48 rounded border"
                    />
                </div>
            @endif
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input
                id="title"
                type="text"
                wire:model.defer="title"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Product title"
            >
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                id="description"
                wire:model.defer="description"
                rows="4"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Short description"
            >
            </textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="unit_price" class="block text-sm font-medium text-gray-700">Unit Price</label>
                <input
                    id="unit_price"
                    type="number"
                    step="0.01"
                    wire:model.defer="unit_price"
                    class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="e.g. 9.99"
                >
                @error('unit_price')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="unit_measure" class="block text-sm font-medium text-gray-700">Unit Measure</label>
                <input
                    id="unit_measure"
                    type="text"
                    wire:model.defer="unit_measure"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="e.g. kg, pcs"
                >
                @error('unit_measure')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                <input
                    id="stock_quantity"
                    type="number"
                    wire:model.defer="stock_quantity"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="e.g. 100"
                >
                @error('stock_quantity')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select
                    id="category_id"
                    wire:model.defer="category_id"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                >
                    <option value="">-- select category --</option>
                    @foreach($this->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="pt-4 text-right">
            <livewire:buttons.action-button
                text="Cancel"
                actionEvent="cancelEdit"
                class="my-2 bg-gray-200 hover:bg-gray-300 text-black"
            />
            <livewire:buttons.action-button
                text="Update"
                actionEvent="updateProduct"
                class="my-2"
            />
            <livewire:buttons.action-button
                text="Delete"
                actionEvent="deleteProduct"
                class="my-2 bg-red-600 hover:bg-red-500"
            />
        </div>
    </form>
</div>
