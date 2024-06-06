<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use Auth;

class BidsController extends Controller
{
    public function getBidsByListing($listingId)
    {
        $bids = Bid::where('listing_id', $listingId)->orderBy('current_bid', 'desc')->get();
        return view('livewire.components.bid-listings', ['bids' => $bids]);
    }
}