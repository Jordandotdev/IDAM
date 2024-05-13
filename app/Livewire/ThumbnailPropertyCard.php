<?php


namespace App\Livewire;

use Livewire\Component;


class ThumbnailPropertyCard extends Component
{

    public $text1;
    public $text2;
    public $text3;

    public function mount($text1, $text2, $text3)
    {
        $this->text1 = $text1;
        $this->text2 = $text2;
        $this->text3 = $text3;
    }

    public function render()
    {
        return view('livewire.components.property-cards.thumbnail-property-card');
    }
}
