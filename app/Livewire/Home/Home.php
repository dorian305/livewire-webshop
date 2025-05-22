<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Home - Webshop')]
    public function render()
    {
        return view('livewire.home.home');
    }
}
