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
    protected $signature = 'bidding:end-period';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ends the bidding period for listings that have reached their end time';

    /**
     * Execute the console command.
     */
    
    public function handle()
    {
        $listings = Listing::where('status', 'open')->where('bid_date', '<', now())->get();

        foreach ($listings as $listing) {
            // Assuming 'bid_date' is a datetime column in your listings table
            $highestBid = $listing->bids()->max('current_bid');
            $listing->update(['status' => 'In Discussion', 'highest_bid' => $highestBid]);

            // Optionally, notify users or perform additional cleanup
            // For example, you could dispatch an event or send a notification here
        }

        $this->info('Bidding period ended for listings.');
    }
}
