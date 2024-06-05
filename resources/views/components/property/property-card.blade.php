<a wire:navigate href="{{ route('listing.show', $listing->id) }}">
    <div
        class="relative group cursor-pointer group overflow-hidden shadow-xl shadow-gray-400 hover:shadow-gray-800 text-gray-50 h-72 w-56  rounded-2xl hover:duration-700 duration-700">
        <div class="w-56 h-72 bg-orange-100 text-gray-800">
            <div class="flex flex-row justify-between">
                <svg class="fill-current stroke-current w-8 h-8 p-2 hover:bg-lime-200  rounded-full m-1" height="100"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 100 100" width="100" x="0"
                    xmlns="http://www.w3.org/2000/svg" y="0">
                    <path class=""
                        d="M15.8,32.9V15.8m0,0H32.9m-17.1,0L37.2,37.2m47-4.3V15.8m0,0H67.1m17.1,0L62.8,37.2m-47,29.9V84.2m0,0H32.9m-17.1,0L37.2,62.8m47,21.4L62.8,62.8M84.2,84.2V67.1m0,17.1H67.1"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                    </path>
                </svg>
            </div>
        </div>
        <div
            class="absolute bg-gray-50 -bottom-24 w-56 p-3 flex flex-col gap-1 group-hover:-bottom-0 group-hover:duration-600 duration-500">
            <span class="text-gray-400 font-bold text-xs">{{ $listing->price }}</span>
            <span class="text-gray-800 font-bold text-3xl mb-2">{{ $listing->title }}</span>
            <p class="text-neutral-800">{{ $listing->getDescriptionExcerpt() }}</p>
        </div>


    </div>
</a>
