<?php

namespace App\Livewire\Buttons;

use Livewire\Component;

class ActionButton extends Component
{
    public string $text = '';
    public string $class = '';
    public string $actionEvent = '';
    public string $data = '';
    
    public function render()
    {
        return view('livewire.buttons.action-button');
    }
}
