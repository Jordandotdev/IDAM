<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Listing;
use Carbon\Carbon;

class EndBiddingPeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bidding:end-period {listingId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ends the bidding period for listings that have reached their end time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(int $listingId)
    {
        $listings = Listing::where('id', $listingId)->where('availability', 'Available')->where('bid_date', '<', now())->get();

        foreach ($listings as $listing) {
            $highestBid = $listing->bids()->max('current_bid');
            $listing->update(['status' => 'In Discussion', 'highest_bid' => $highestBid]);
        }

        $this->info('Bidding period ended for listings.');
    }
}