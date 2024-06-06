<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex p-8 gap-2">
                    @livewire('info-bubble', ['text1' => '200', 'text2' => 'Customers', 'color' => 'fill-red-300'])
                    @livewire('info-bubble', ['text1' => '200', 'text2' => 'Properties', 'color' => 'fill-pink-300'])
                    @livewire('info-bubble', ['text1' => '+200', 'text2' => 'Million Revenue', 'color' => 'fill-blue-300'])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
