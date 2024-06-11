<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bid;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BidListings extends Component
{
    public $bids;
    public $listing;
    public $currentBid;
    public $base_bid;
    public $lastCurrentBid;
    public $minBid;
    public $timer;

    public $startTime;

    Public $endTime;

    public $totalDurationInSeconds;

    public $remainingTimeInSeconds;

    public $timeLeftInHours;

    public function mount($price, $id)
    {
        $this->base_bid = $price;
        $this->listing = Listing::with('contract')->find($id);
        $this->bids = Bid::where('listing_id', $id)->with('user')->get();

        $latestBid = Bid::where('listing_id', $id)->orderBy('created_at', 'desc')->first();
        $this->lastCurrentBid = $latestBid ? $latestBid->current_bid : null;

        $this->updateMinBid();
        $this->getTimeLeft();
    }

    public function render()
    {
        $this->updateMinBid();
        return view('livewire.components.bid-listings');
    }

    private function updateMinBid()
    {
        $percentageIncrease = $this->lastCurrentBid ? 0.001 * $this->lastCurrentBid : 0.001 * $this->base_bid;
        $fixedAmount = $this->lastCurrentBid ? 500 : 1000;
        $this->minBid = round(($percentageIncrease + $fixedAmount + ($this->lastCurrentBid ?? $this->base_bid)) / 100) * 100;
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
        }

        $bid = new Bid();
        $bid->user_id = Auth::id();
        $bid->listing_id = $this->listing->id;
        $bid->base_bid = $this->base_bid;
        $bid->current_bid = $validatedData['currentBid'];

        try {
            $bid->save();
            $this->reset('currentBid');
            $this->bids->prepend($bid);
            $this->lastCurrentBid = $bid->current_bid;
            $this->updateMinBid();
            session()->flash('success', 'Your Bid has been placed!');
        } catch (\Exception $e) {
            session()->flash('message', 'Bid not placed. Please try again.');
        }

        $this->getTimeLeft();
    }

    public function getTimeLeft()
{

    $this->startTime = strtotime($this->listing->contract->bid_date. ' '. $this->listing->contract->bid_time);
    $this->endTime = $this->startTime + ($this->listing->contract->bid_duration * 3600);
    $this->totalDurationInSeconds = $this->endTime - $this->startTime;
    $this->remainingTimeInSeconds = max(0, $this->totalDurationInSeconds - (time() - $this->startTime));
    $this->timeLeftInHours = floor($this->remainingTimeInSeconds / 3600);
    $this->timer = [
        'seconds' => $this->remainingTimeInSeconds,
        'hours' => $this->timeLeftInHours
    ];

    $this->dispatch('updateCountdown', ['seconds' => $this->timer['seconds'], 'hours' => $this->timer['hours']]);
}
}
