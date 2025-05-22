<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Dashboard extends Component
{
    #[Url(as: 'tab', keep: true)]
    public string $activeComponent = 'products';
    public array $buttons = [
        [
            'text' => 'Products',
            'component' => 'products'
        ],
        [
            'text' => 'Categories',
            'component' => 'categories'
        ],
        [
            'text' => 'Users',
            'component' => 'users'
        ],
    ];

    #[Title('Admin dashboard - Webshop')]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }

    #[On('change-tab-component')]
    public function loadComponent(string $componentName): void
    {
        $this->activeComponent = $componentName;
    }
}
