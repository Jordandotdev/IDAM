<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;


class ContactShare extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }
    
    public function render()
    {
        return view('livewire.components.contact-share');
    }
}
