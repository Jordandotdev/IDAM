<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\Listing;

class ThumbnailPropertyCard extends Component
{

    public $listings;

    public function mount()
    {
        $this->listings = Listing::first();
    }

    public function render()
    {
        return view('livewire.layouts.main-home-page');
    }
}
