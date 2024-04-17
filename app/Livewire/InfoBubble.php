<?php

namespace App\Livewire;

use Livewire\Component;

class InfoBubble extends Component
{
    public $text1;
    public $text2;
    public $color;

    public function mount($text1, $text2, $color)
    {
        $this->text1 = $text1;
        $this->text2 = $text2;
        $this->color = $color;
    }

    public function render()
    {
        return view('livewire.components.info-bubble');
    }
}
