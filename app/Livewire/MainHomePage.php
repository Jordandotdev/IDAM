<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Listing;

class MainHomePage extends Component
{
    public function render()
    {
        return view('livewire.layouts.main-home-page', [
            'listings' => Listing::all(),
        ]);
    }
}
