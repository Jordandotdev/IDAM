<x-app-layout>
    <div class="container mx-auto mt-1 p-4">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">
                        {{ $mode === 'create' ? 'Create Contract' : 'Update Contract' }}
                    </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        {{ $mode === 'create' ? 'Create a new Contract.' : 'Update the Contract\'s details.' }}
                    </p>
                </div>

                <form method="post"
                    action="{{ $contract->id ? route('contracts.update', $contract->id) : route('contracts.store') }}"
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @csrf
                    @if ($contract->id)
                        @method('PUT')
                    @endif

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full">
                                <label for="listing_id" class="block text-sm font-medium leading-6 text-gray-900">
                                    Listing ID
                                </label>
                                <div class="mt-2">
                                    <select id="listing_id" name="listing_id"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach ($listings as $listing)
                                            <option value="{{ $listing->id }}"
                                                {{ old('listing_id', $contract->listing_id ?? '') == $listing->id ? 'selected' : '' }}>
                                                {{ $listing->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('listing_id')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="agreement" class="block text-sm font-medium leading-6 text-gray-900">
                                    Agreement
                                </label>
                                <div class="mt-2">
                                    <textarea id="agreement" name="agreement" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('agreement', $contract->agreement ?? '') }}</textarea>
                                </div>
                                @error('agreement')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="contract_period" class="block text-sm font-medium leading-6 text-gray-900">
                                    Contract Period
                                </label>
                                <div class="mt-2">
                                    <input id="contract_period" name="contract_period"
                                        value="{{ old('contract_period', $contract->contract_period ?? '') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                @error('contract_period')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="col-span-full">
                                <label for="bid_date" class="block text-sm font-medium leading-6 text-gray-900">
                                    Bid Date
                                </label>
                                <div class="mt-2">
                                    <input id="bid_date" name="bid_date" type="date"
                                        value="{{ old('bid_date', $contract->bid_date ?? '') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                @error('bid_date')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="bid_time" class="block text-sm font-medium leading-6 text-gray-900">
                                    Bid Time
                                </label>
                                <div class="mt-2">
                                    <input id="bid_time" name="bid_time" type="time"
                                        value="{{ old('bid_time', $contract->bid_time ?? '') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                @error('bid_time')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="bid_duration" class="block text-sm font-medium leading-6 text-gray-900">
                                    Bid Duration
                                </label>
                                <div class="mt-2">
                                    <input id="bid_duration" name="bid_duration"
                                        value="{{ old('bid_duration', $contract->bid_duration ?? '') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                @error('bid_duration')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            

                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
