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
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mb-5" role="alert"
            x-data="{ showMessage: true }" x-show="showMessage">
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
    <h1 class="my-4 p-2 bg-gray-200 rounded-xl">Minimum Bid possible - Rs: {{ number_format($minBid + 50) }}</h1>
    <div class="user-bids px-3 py-2 mt-5">

        <h1 class="text-gray-400">Recent Bids :</h1>
        @forelse($this->bids->sortByDesc('current_bid')->take(3) as $bid)
            <div class="bid [&:not(:last-child)]:border-b border-gray-100 py-5">
                <div class="user-meta flex text-sm items-center">
                    <span class="text-gray-900 font-semibold">{{ $bid->user->name }}</span>
                    <span class="text-gray-500">. {{ $bid->created_at->diffForHumans() }} -
                        Rs:{{ number_format($bid->current_bid, 2) }}</span>
                </div>
            </div>
        @empty
            <div class="text-gray-500 text-center">
                <span>No Bids Placed</span>
            </div>
        @endforelse
    </div>

    <div id="listingStatus" class="mt-5 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-lg">
        <h2 class="text-lg font-semibold">Time Remaining</h2>
        <div id="countdown" class="text-lg mt-2">{{$timer['hours']}} {{ gmdate('i:s', $timer['seconds']) }} Remaining</div>
    </div>

</div>

<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('updateCountdown', data => {
            const countdownElement = document.getElementById('countdown');
            const seconds = data.seconds || 0;
            const hours = data.hours || 0;
    
            const updateCountdown = () => {
                let hoursLeft = seconds / 3600;
                const days = Math.floor(hoursLeft / 24); // Calculate days first
                hoursLeft -= days * 24; // Subtract days from hours
    
                const remainingSeconds = seconds % 60;
                const remainingMinutes = Math.floor((seconds % 3600) / 60);
                const remainingHours = Math.floor(hoursLeft);
    
                countdownElement.innerText =
                    `${days} Days ${remainingHours} Hours ${remainingMinutes} Minutes ${remainingSeconds} Seconds Remaining`;
    
                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.innerText = "Bidding Ended";
                }
    
                seconds--;
            };
    
            updateCountdown();
            const countdownInterval = setInterval(updateCountdown, 1000);
        });
    });
</script>
