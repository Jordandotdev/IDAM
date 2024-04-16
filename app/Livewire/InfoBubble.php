<?php

namespace App\Livewire;

use Livewire\Component;

class InfoBubble extends Component
{
    public $number;
    public $text;

    public function mount($number, $text)
    {
        $this->number = $number;
        $this->text = $text;
    }

    public function render()
    {
        return view('livewire.components.info-bubble');
    }
}
