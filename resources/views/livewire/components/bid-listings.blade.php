<div class="p-4 rounded-lg mt-10 bids-box border-t shadow-2xl pt-10" style="max-width:400px">
    <h2 class="text-2xl font-semibold text-gray-900 mb-5">Bidding</h2>
    @auth
        <div>
            <input type="number" step="0.01" min="0" wire:model="currentBid"
                class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
                placeholder="Enter your bid amount">

            <button wire:click="placeBid"
                class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
                Place Bid
            </button>
        </div>
    @else
        <a wire:navigate class="text-blue-500 underline py-1" href="{{ route('login') }}">Login to Place Bids</a>
    @endauth
    <div class="user-bids px-3 py-2 mt-5">
        @forelse($this->bids as $bid)
            <div class="bid [&:not(:last-child)]:border-b border-gray-100 py-5">
                <div class="user-meta flex mb-4 text-sm items-center">
                    <span class="text-gray-900 font-semibold">{{ $bid->user->name }}</span>
                    <span class="text-gray-500">. {{ $bid->created_at->diffForHumans() }} -
                        ${{ number_format($bid->current_bid, 2) }}</span>
                </div>
            </div>
        @empty
            <div class="text-gray-500 text-center">
                <span>No Bids Placed</span>
            </div>
        @endforelse
    </div>

</div>
