<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class=" px-6 py-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 ">
            Quick Stats
        </h1>
        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex p-8 gap-2">
                @livewire('info-bubble', ['text1' => $users->count(), 'text2' => 'Customers', 'color' => 'fill-red-300'])
                @livewire('info-bubble', ['text1' =>  $listings->count(), 'text2' => 'Properties', 'color' => 'fill-pink-300'])
                @livewire('info-bubble', ['text1' =>($listings->sum('price') / 1000000), 'text2' => 'Mil In Value', 'color' => 'fill-blue-300'])
            </div>
        </div>
    </div>
    <div class="pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class=" px-6 py-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 ">
            Charts
        </h1>
        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex p-8 gap-2">
               @livewire('dashboard-progress-chart')
            </div>
        </div>
    </div>
</div>
