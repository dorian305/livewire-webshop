<div>
    <input
        type="search"
        wire:model.live="searchTerm"
        placeholder="Search for category title or description..."
        class="w-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mb-6"
    />

    @if ($this->categories->isEmpty())
        <livewire:paragraphs.paragraph-standard
            text="No categories to display."
            aligned="center"
        />
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($this->categories as $category)
                    <tr wire:key="{{ $category->id }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 break-words max-w-xs">{{ $category->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <livewire:buttons.link-button
                                text="Edit"
                                link="{{ route('edit-category', $category->id) }}"
                                class="bg-blue-600 hover:bg-blue-500 text-white"
                                wire:key="edit-{{ $category->id }}"
                            />
                            <livewire:buttons.action-button
                                text="Delete"
                                actionEvent="categoryDeleted"
                                data="{
                                    categoryId: {{ $category->id }}
                                }"
                                class="bg-red-600 hover:bg-red-500 text-white"
                                wire:key="delete-{{ $category->id }}"
                            />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-4 flex justify-end">
        <livewire:buttons.link-button
            text="Add new category"
            link="{{ route('create-category') }}"
            class="bg-blue-600 text-white hover:bg-blue-500"
        />
    </div>
</div>
