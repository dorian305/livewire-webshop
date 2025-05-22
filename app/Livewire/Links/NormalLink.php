<?php

namespace App\Livewire\Links;

use Livewire\Component;

class NormalLink extends Component
{
    public string $text = '';
    public string $link = '';
    public bool $wireNavigate = true;
    
    public function render()
    {
        return view('livewire.links.normal-link');
    }
}
