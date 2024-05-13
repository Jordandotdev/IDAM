<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Listing;
use App\Models\User;

class MainHomePage extends Component
{
    public $listings;
    public $users;

    public function mount()
    {
        $this->listings = Listing::all();
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.layouts.main-home-page');
    }
}
