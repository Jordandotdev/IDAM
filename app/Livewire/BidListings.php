<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bid;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class BidListings extends Component
{
    public $bids;
    public $user;
    public $listing;
    public $current_bid;
    public $base_bid;

    public $titles;

    public function mount($price, $id)
    {
        $this->base_bid = $price;
        $this->listing = Listing::find($id);
        $this->user = Bid::where('id', $id)->with('user')->get();
        $this->bids = Bid::where('id', $id)->get();
    }

    public function render()
    {
        return view('livewire.components.bid-listings');
    }

    public function placeBid()
    {

        $validatedData = $this->validate([
            'current_bid' => 'required|numeric|min:0',
        ]);


        if (!Auth::check()) {
            session()->flash('message', 'Please log in to place a bid.');
            return;
        }


        $bid = new Bid();
        $bid->user_id = Auth::user()->id;
        $bid->listing_id = $this->listing->id;
        $bid->current_bid = $this->current_bid;
        try {
            \Log::info("Attempting to save bid");
            $bid->save();
            \Log::info("Bid saved successfully");
        } catch (\Exception $e) {
            session()->flash('message', 'Bid not placed. Please try again.');
            return;
        }


        $this->reset('current_bid');


        session()->flash('message', 'Bid placed successfully.');
    }
}
