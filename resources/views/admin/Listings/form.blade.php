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

                <form method="post" enctype="multipart/form-data"
                    @if ($listing->id) action="{{ route('listings.update', $listing->id) }}"
                    @else
                    action="{{ route('listings.store') }}" @endif
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">

                    @csrf
                    @if ($listing->id)
                        @method('PUT')
                    @endif

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            {{-- Location Type --}}
                            <div class="col-span-full">
                                <label for="property_type" class="block text-sm font-medium leading-6 text-gray-900">
                                    Location Type
                                </label>
                                <div class="mt-2">
                                    <select id="property_type" name="property_type"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach ($propertyType as $propertytype)
                                            <option value="{{ $propertytype->value }}"
                                                {{ $listing && old('role', $listing?->propertytype?->value) == $propertytype->value ? 'selected' : '' }}>
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

                            {{-- Location --}}

                            {{-- Title --}}
                            <div class="col-span-full">
                                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                    Title
                                </label>
                                <div class="mt-2">
                                    <input id="title" name="title" value="{{ old('title', $listing->title) }}"
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

                            {{-- Description --}}
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

                            {{-- Price --}}
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

                            {{-- Images --}}
                            <div class="col-span-full">
                                <label for="images[]" class="block text-sm font-medium leading-6 text-gray-900">
                                    Images
                                </label>
                                <div class="mt-2">
                                    <input id="images[]" name="images[]" type="file" multiple accept="image/*"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Upload one or more images for the listing.
                                </p>
                                @error('images.*')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- bedrooms --}}
                            <div class="col-span-full">
                                <label for="bedrooms" class="block text-sm font-medium leading-6 text-gray-900">
                                    Bedrooms
                                </label>
                                <div class="mt-2">
                                    <input id="bedrooms" name="bedrooms" type="number"
                                        value="{{ old('bedrooms', $listing->bedrooms) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Number of bedrooms in the listing.
                                </p>
                                @error('bedrooms')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Bathrooms --}}
                            <div class="col-span-full">
                                <label for="bathrooms" class="block text-sm font-medium leading-6 text-gray-900">
                                    Bathrooms
                                </label>
                                <div class="mt-2">
                                    <input id="bathrooms" name="bathrooms" type="number"
                                        value="{{ old('bathrooms', $listing->bathrooms) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Number of bathrooms in the listing.
                                </p>
                                @error('bathrooms')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Floor Area --}}
                            <div class="col-span-full">
                                <label for="floor_area" class="block text-sm font-medium leading-6 text-gray-900">
                                    Floor Area
                                </label>
                                <div class="mt-2">
                                    <input id="floor_area" name="floor_area" type="number"
                                        value="{{ old('floor_area', $listing->floor_area) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Floor area of the listing in square feet.
                                </p>
                                @error('floor_area')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- floors --}}
                            <div class="col-span-full">
                                <label for="floors" class="block text-sm font-medium leading-6 text-gray-900">
                                    Floors
                                </label>
                                <div class="mt-2">
                                    <input id="floors" name="floors" type="number"
                                        value="{{ old('floors', $listing->floors) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Number of floors in the listing.
                                </p>
                                @error('floors')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Land area --}}
                            <div class="col-span-full">
                                <label for="land_area" class="block text-sm font-medium leading-6 text-gray-900">
                                    Land Area
                                </label>
                                <div class="mt-2">
                                    <input id="land_area" name="land_area" type="number"
                                        value="{{ old('land_area', $listing->land_area) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Land area of the listing in perches.
                                </p>
                                @error('land_area')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- car parking spaces --}}
                            <div class="col-span-full">
                                <label for="car_parking_spaces"
                                    class="block text-sm font-medium leading-6 text-gray-900">
                                    Car Parking Spaces
                                </label>
                                <div class="mt-2">
                                    <input id="car_parking_spaces" name="car_parking_spaces" type="number"
                                        value="{{ old('car_parking_spaces', $listing->car_parking_spaces) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Number of car parking spaces in the listing.
                                </p>
                                @error('car_parking_spaces')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- age of building --}}
                            <div class="col-span-full">
                                <label for="age_of_building"
                                    class="block text-sm font-medium leading-6 text-gray-900">
                                    Age of Building
                                </label>
                                <div class="mt-2">
                                    <input id="age_of_building" name="age_of_building" type="number"
                                        value="{{ old('age_of_building', $listing->age_of_building) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Age of the building in months.
                                </p>
                                @error('age_of_building')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Width of approach road --}}
                            <div class="col-span-full">
                                <label for="width_of_approach_road"
                                    class="block text-sm font-medium leading-6 text-gray-900">
                                    Width of Approach Road
                                </label>
                                <div class="mt-2">
                                    <input id="width_of_approach_road" name="width_of_approach_road" type="number"
                                        value="{{ old('width_of_approach_road', $listing->width_of_approach_road) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Width of Approach Road in Feet.
                                </p>
                                @error('width_of_approach_road')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            {{-- Developer --}}
                            <div class="col-span-full">
                                <label for="developer" class="block text-sm font-medium leading-6 text-gray-900">
                                    Developer
                                </label>
                                <div class="mt-2">
                                    <input id="developer" name="developer"
                                        value="{{ old('developer', $listing->developer) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Developer of the listing.
                                </p>
                                @error('developer')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Availability --}}
                            <div class="col-span-full">
                                <label for="availability" class="block text-sm font-medium leading-6 text-gray-900">
                                    Availability
                                </label>
                                <div class="mt-2">
                                    <select id="availability" name="availability"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="Available"
                                            {{ old('availability', $listing->availability) == 'Available' ? 'selected' : '' }}>
                                            Available</option>
                                        <option value="Sold"
                                            {{ old('availability', $listing->availability) == 'Sold' ? 'selected' : '' }}>
                                            Sold</option>
                                        <option value="In Discussion"
                                            {{ old('availability', $listing->availability) == 'In Discussion' ? 'selected' : '' }}>
                                            In Discussion</option>
                                    </select>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">
                                        Availability status of the listing.
                                    </p>
                                    @error('availability')
                                        <p class="mt-3 text-sm leading-6 text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Furnishing Status --}}
                            <div class="col-span-full">
                                <label for="furnishing_status"
                                    class="block text-sm font-medium leading-6 text-gray-900">
                                    Furnishing Status
                                </label>
                                <div class="mt-2">
                                    <select id="furnishing_status" name="furnishing_status"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="1"
                                            {{ old('furnishing_status', $listing->furnishing_status) == '1' ? 'selected' : '' }}>
                                            Furnished</option>
                                        <option value="2"
                                            {{ old('furnishing_status', $listing->furnishing_status) == '2' ? 'selected' : '' }}>
                                            Unfurnished</option>
                                    </select>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">
                                        Furnishing status of the listing.
                                    </p>
                                    @error('furnishing_status')
                                        <p class="mt-3 text-sm leading-6 text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                                <button type="button"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
