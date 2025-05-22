<?php

namespace App\Livewire\Buttons;

use Livewire\Component;

class ActionButtonDisabled extends Component
{
    public string $text = '';
    public string $class = '';
    
    public function render()
    {
        return view('livewire.buttons.action-button-disabled');
    }
}
