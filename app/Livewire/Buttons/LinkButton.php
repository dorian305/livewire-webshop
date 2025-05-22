<?php

namespace App\Livewire\Buttons;

use Livewire\Component;

class LinkButton extends Component
{
    public string $link;
    public string $text;
    public string $class;
    
    public function render()
    {
        return view('livewire.buttons.link-button');
    }
}
