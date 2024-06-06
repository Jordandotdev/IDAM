<div class="p-4 rounded-lg mt-10 bids-box border-t shadow-2xl pt-10" style="max-width:400px">

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-5"
            role="alert" x-data="{ showMessage: true }" x-show="showMessage">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="showMessage = false">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </span>
        </div>
    @endif
    @if (session('message'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mb-5"
            role="alert" x-data="{ showMessage: true }" x-show="showMessage">
            <strong class="font-bold">System : </strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="showMessage = false">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </span>
        </div>
    @endif


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
        <h1>Recent Bids</h1>
        @forelse($this->bids->sortByDesc('current_bid')->take(3) as $bid)
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
