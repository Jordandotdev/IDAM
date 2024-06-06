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

    public $lastBidCurrentBid;

    public function mount($price, $id)
    {
        $this->base_bid = $price;
        $this->listing = Listing::find($id);
        $this->bids = Bid::where('listing_id', $id)->with('user')->get();

    }

    public function render()
    {
        return view('livewire.components.bid-listings');
    }

    public function placeBid()
    {
        $this->lastBidCurrentBid = end($this->bids)->current_bid ?? null;

        $validatedData = $this->validate([
            'currentBid' => 'required|numeric|min:0',
        ]);

        if (!Auth::check()) {
            session()->flash('message', 'Please log in to place a bid.');
            return;
        }

        if ($validatedData['currentBid'] <= $this->base_bid ) {
            session()->flash('message', 'Your bid must be higher than the base bid.');
            return;
        }



        $bid = new Bid();
        $bid->user_id = Auth::id();
        $bid->listing_id = $this->listing->id;
        $bid->base_bid = $this->base_bid;
        $bid->current_bid = $validatedData['currentBid'];

        try {
            \Log::info("Attempting to save bid");
            $bid->save();
            \Log::info("Bid saved successfully");
            $this->reset('currentBid');
            $this->bids->prepend($bid);
            return session()->flash('success', 'Your Bid has been placed!');
        } catch (\Exception $e) {
            \Log::error("Error saving bid: " . $e->getMessage());
            session()->flash('message', 'Bid not placed. Please try again.');
            return;
        }
    }
}
