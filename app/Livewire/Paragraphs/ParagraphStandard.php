<?php

namespace App\Livewire\Paragraphs;

use Livewire\Component;

class ParagraphStandard extends Component
{
    public string $text = '';
    public string $aligned = 'left';
    public string $class = '';
    
    public function render()
    {
        return view('livewire.paragraphs.paragraph-standard');
    }
}
