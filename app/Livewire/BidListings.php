<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Bid;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BidListings extends Component
{
    public $bids;
    public $listing;
    public $currentBid;
    public $base_bid;

    public function mount($price, $id)
    {
        $this->base_bid = $price;
        $this->listing = Listing::find($id);

        // Fetch all bids related to the listing, including user information
        $this->bids = Bid::where('listing_id', $id)->with('user')->get();
    }

    public function render()
    {
        return view('livewire.components.bid-listings');
    }

    public function placeBid()
    {
        // Validate the currentBid input
        $validatedData = $this->validate([
            'currentBid' => 'required|numeric|min:0',
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            session()->flash('message', 'Please log in to place a bid.');
            return;
        }

        // Create a new bid instance
        $bid = new Bid();
        $bid->user_id = Auth::id();
        $bid->listing_id = $this->listing->id;
        $bid->base_bid = $this->base_bid;
        $bid->current_bid = $validatedData['currentBid']; // Use validated data

        try {
            \Log::info("Attempting to save bid");
            $bid->save(); // Save the bid
            \Log::info("Bid saved successfully");

            // Reset the currentBid property
            $this->reset('currentBid');

            // Update the bids list
            $this->bids->prepend($bid);

            session()->flash('message', 'Bid placed successfully.');
        } catch (\Exception $e) {
            \Log::error("Error saving bid: " . $e->getMessage());
            session()->flash('message', 'Bid not placed. Please try again.');
            return;
        }
    }
}
