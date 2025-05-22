<div>
    <input
        type="search"
        wire:model.live="searchTerm"
        placeholder="Search for users by name or email..."
        class="w-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mb-6"
    />

    @foreach ($this->users as $user)
        <div
            class="hover:bg-gray-50 p-4 border border-gray-200 mb-4 shadow-sm transition-colors duration-200"
            wire:key="user-{{ $user->id }}"
        >
            <div class="flex flex-col md:flex-row items-start">
                @if ($user->profile_photo_path)
                    <livewire:images.image
                        url="{{ Storage::url($user->profile_photo_path) }}"
                        alt="{{ $user->name }}"
                        size="md"
                        wire:key="user-image-{{ $user->id }}"
                    />
                @endif
                <div class="flex flex-col flex-grow mt-4 md:mt-0 md:ml-6">
                    <div class="flex items-center justify-between">
                        <livewire:headers.header3
                            text="{{ $user->name }}"
                            aligned="left"
                            wire:key="name-{{ $user->id }}"
                        />
                        <span
                            class="text-sm {{ $user->is_admin ? 'text-red-600' : 'text-green-600' }}"
                            wire:key="role-{{ $user->id }}"
                        >
                            {{ $user->is_admin ? 'Admin' : 'User' }}
                        </span>
                    </div>
                    <livewire:paragraphs.paragraph-standard
                        text="{{ $user->email }}"
                        aligned="left"
                        class="mt-1 text-gray-600"
                        wire:key="email-{{ $user->id }}"
                    />
                    <div class="mt-2 text-sm text-gray-500 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <span wire:key="joined-{{ $user->id }}">
                            Joined: {{ $user->created_at->format('M j, Y') }}
                        </span>
                        <span wire:key="verified-{{ $user->id }}">
                            {{ $user->email_verified_at
                                ? 'Verified on ' . $user->email_verified_at->format('M j, Y')
                                : 'Not verified' }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="mt-4 flex space-x-4">
                        <livewire:buttons.link-button
                            text="Edit"
                            link="{{ route('edit-user', $user->id) }}"
                            class="bg-blue-600 hover:bg-blue-500 text-white w-1/12"
                            wire:key="edit-{{ $user->id }}"
                        />
                        <livewire:buttons.action-button
                            text="Delete"
                            class="bg-red-600 hover:bg-red-500 text-white w-1/12"
                            actionEvent="userDeleted"
                            data="{
                                userId: {{ $user->id }},
                            }"
                            wire:key="delete-{{ $user->id }}"
                        />
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if ($this->users->isEmpty())
        <livewire:paragraphs.paragraph-standard
            text="No users to display."
            aligned="center"
        />
    @endif

    @if ($this->users->isNotEmpty() && $this->users->hasMorePages())
        <div class="text-center my-6">
            <livewire:buttons.action-button
                text="Load more users"
                actionEvent="load-more-users"
            />
        </div>
    @endif

    <div class="flex mt-4 justify-end">
        <livewire:buttons.link-button
            text="Add new user"
            link="{{ route('create-user') }}"
            class="bg-blue-600 text-white hover:bg-blue-500"
        />
    </div>
</div>
