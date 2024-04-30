<x-app-layout>
    <div class="container mx-auto mt-1 p-4">
        <div class="space-y-10 divide-y divide-gray-900/10">

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">
                        {{ $mode === 'create' ? 'Create Listing' : 'Update Listing' }}
                    </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        {{ $mode === 'create' ? 'Create a new listing.' : 'Update the listing details.' }}
                    </p>
                </div>

                <form method="post"
                    @if($listing->id)
                    action="{{ route('listings.update', $listing->id) }}"
                    @else
                    action="{{ route('listings.store') }}"
                    @endif
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">

                    @csrf
                    @if ($listing->id)
                        @method('PUT')
                    @endif

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full">
                                <label for="property_type" class="block text-sm font-medium leading-6 text-gray-900">
                                    Location Type
                                </label>
                                <div class="mt-2">
                                    <select id="property_type" name="property_type"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach ($propertyType as $propertytype)
                                        <option value="{{ $propertytype->value }}"
                                            {{ ($listing && old('role', $listing?->propertytype?->value) == $propertytype->value ? 'selected' : '') }}>
                                            {{ ucwords(str_replace('_', ' ', Str::snake($propertytype->name))) }}
                                        @endforeach
                                </select>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Type of location for the listing.
                                </p>
                                @error('propertyType')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                                </div>


                                </div>

                            <div class="col-span-full">
                                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                    Title
                                </label>
                                <div class="mt-2">
                                    <input id="title" name="title"
                                        value="{{ old('title', $listing->title) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Title of the listing.
                                </p>
                                @error('title')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                                    Description
                                </label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description', $listing->description) }}</textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Description of the listing.
                                </p>
                                @error('description')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">
                                    Price
                                </label>
                                <div class="mt-2">
                                    <input id="price" name="price" type="number" step="any"
                                        value="{{ old('price', $listing->price) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Price of the listing.
                                </p>
                                @error('price')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
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
                