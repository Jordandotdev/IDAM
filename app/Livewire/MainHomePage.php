<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Listing;

class MainHomePage extends Component
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
