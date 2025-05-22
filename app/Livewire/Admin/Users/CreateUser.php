<?php

namespace App\Livewire\Admin\Users;

use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateUser extends Component
{
    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024')]
    public $image;
    
    #[Validate('required|string|max:255')]
    public string $name;
    #[Validate('required|string|email|max:255|unique:users')]
    public string $email;
    #[Validate(['required', 'string', 'confirmed'])]
    public string $password;
    #[Validate('required|boolean')]
    public string $isAdmin;

    public function render()
    {
        return view('livewire.admin.users.create-user');
    }
}
