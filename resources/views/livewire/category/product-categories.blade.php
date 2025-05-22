<div>
    <livewire:headers.header1
        text="Browse products by categories:"
        aligned="center"
    />
    <livewire:headers.subheader1
        text="Select the category to start browsing products."
        aligned="center"
    />

    @if ($categories->isEmpty())
        <livewire:paragraphs.paragraph-standard
            text="No categories found."
            aligned="center"
        />
    @endif
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($categories as $category)
            <livewire:buttons.link-button
                link="{{ route('list-products', ['categoryId' => $category->id]) }}"
                text="{!! htmlspecialchars($category->name, ENT_NOQUOTES, 'UTF-8') !!}"
            />
        @endforeach
    </div>
</div>
