<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Listing;

class ThumbnailPropertyCard extends Component
{
    public $text1;
    public $text2;
    public $text3;
    public $listing = Listing::class;
    //create a function to extract the clean numeric output for $text1


    //create a function to limit the description to the set character limit for the style of the property card 


    public function mount($text1, $text2, $text3, $listing) // Assuming you pass the listing ID
    {
        $this->text1 = $text1;
        $this->text2 = $text2;
        $this->text3 = $text3;
        $this->listing = Listing::findOrFail($listing);
    }

    public function render()
    {
        return view('livewire.components.property-cards.thumbnail-property-card');
    }
}