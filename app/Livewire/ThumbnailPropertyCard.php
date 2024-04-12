<?php


namespace App\Livewire;

use Livewire\Component;

class ThumbnailPropertyCard extends Component
{

/*function needs to be written here to pass
the data from the tables into the front end
example---

use Livewire\Component;
use App\Models\Property;

class ThumbnailPropertyCard extends Component
{
    public $properties;

    public function mount()
    {
        $this->properties = Property::all();
    }

    public function render()
    {
        return view('livewire.thumbnail-property-card');
    }
}
*/
    public function render()
    {
        return view('livewire.components.thumbnail-property-card');
    }
}
