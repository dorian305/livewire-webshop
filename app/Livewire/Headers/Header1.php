<?php

namespace App\Livewire\Headers;

use Livewire\Component;

class Header1 extends Component
{
    public string $text = '';
    public string $aligned = 'left';

    public function render()
    {
        return view('livewire.headers.header1');
    }
}
