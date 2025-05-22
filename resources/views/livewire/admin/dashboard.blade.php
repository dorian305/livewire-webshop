<div>
    <livewire:headers.header1
        text="Dashboard"
        aligned="center"
    />
    <livewire:headers.subheader1
        text="Manage webshop products, categories and more here."
        aligned="center"
    />

    <!-- Component tabs -->
    <div class="flex flex-row justify-between space-x-4 my-4 py-4 border-b">
        @foreach ($buttons as $button)
            <livewire:buttons.action-button
                text="{{ $button['text'] }}"
                actionEvent="change-tab-component"
                data="{
                    componentName: '{{ $button['component'] }}'
                }"
                class="w-full"
                wire:key="tab-button-{{ $button['component'] }}"
            />
        @endforeach
    </div>

    @if ($activeComponent === 'products')
        <livewire:admin.products.list-products />
    @elseif ($activeComponent === 'categories')
        <livewire:admin.categories.list-categories />
    @elseif ($activeComponent === 'users')
        <livewire:admin.users.list-users />
    @endif
</div>
