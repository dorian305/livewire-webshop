<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ListUsers extends Component
{
    public int $perPage = 6;
    public int $increment = 3;
    public ?string $searchTerm = null;

    public function render()
    {
        return view('livewire.admin.users.list-users');
    }

    #[Computed]
    public function users(): LengthAwarePaginator {
        return User::when($this->searchTerm, function ($query) {
            $searchTermLowerCase = strtolower($this->searchTerm);

            $query->whereLike('name', "%{$searchTermLowerCase}%")
                ->whereLike('email', "%{$searchTermLowerCase}%");
        })->paginate($this->perPage);
    }

    #[On('load-more-users')]
    public function incrementPerPage(): void
    {
        $this->perPage += $this->increment;

        if ($this->perPage >= $this->users->count()) {
            $this->perPage = $this->users->count();
        }
    }

    #[On('userDeleted')]
    public function deleteUser(int $userId): void
    {
        // Can't delete currently logged in user
        if ($userId === auth()->user()->id) return;

        User::findOrFail($userId)->delete();
        unset($this->users);
    }
}
