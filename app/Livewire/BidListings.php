<?php
namespace App\Livewire;

use Illuminate\Database\Console\Migrations\RefreshCommand;
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
    public $lastCurrentBid;
    public $minBid;

    public function mount($price, $id)
    {
        $this->base_bid = $price;
        $this->listing = Listing::find($id);
        $this->bids = Bid::where('listing_id', $id)->with('user')->get();

        $latestBid = Bid::where('listing_id', $id)->orderBy('created_at', 'desc')->first();
        if ($latestBid) {
            $this->lastCurrentBid = $latestBid->current_bid;
        } else {
            $this->lastCurrentBid = null;
        }

        $this->updateMinBid();
    }

    public function render()
    {
        $this->updateMinBid();
        return view('livewire.components.bid-listings');
    }

    private function updateMinBid()
{
    if ($this->lastCurrentBid) {
        $percentageIncrease = 0.001 * $this->lastCurrentBid;
        $fixedAmount = 500;
        $this->minBid = round(($percentageIncrease + $fixedAmount + $this->lastCurrentBid) / 100) * 100;
    } else {
        $percentageIncrease = 0.001 * $this->base_bid;
        $fixedAmount = 1000;
        $this->minBid = round(($percentageIncrease + $fixedAmount + $this->base_bid) / 100) * 100;
    }
}

    public function placeBid()
    {
        $validatedData = $this->validate([
            'currentBid' => 'required|numeric|min:0',
        ]);

        if (!Auth::check()) {
            session()->flash('message', 'Please log in to place a bid.');
            return;
        }

        if ($validatedData['currentBid'] <= $this->minBid) {
            session()->flash('message', 'Your bid must be higher than the base bid or match the minimum bid.');
            return;
        } else {
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
                $this->lastCurrentBid = $bid->current_bid;
                $this->updateMinBid();
                return session()->flash('success', 'Your Bid has been placed!');
                //refresh the page
            } catch (\Exception $e) {
                \Log::error("Error saving bid: " . $e->getMessage());
                session()->flash('message', 'Bid not placed. Please try again.');
                return;
            }
        }
    }
}
