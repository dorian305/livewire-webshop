<?php

namespace App\Livewire\Images;

use Livewire\Component;

class Image extends Component
{
    public string $url = '';
    public string $alt = '';
    public string $size = '';
    public string $rounded = '';
    public string $class = '';

    public function render()
    {
        return view('livewire.images.image');
    }
}
