<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

</head>

<body class="flex flex-col">

    @livewire('main-nav')
    <article class="col-span-4 md:col-span-3 mt-24 mx-auto py-5 w-full" style="max-width:1200px">
        <div class="container mx-auto">
            <div class="listing-images flex items-center justify-center">
                @foreach ($listing->images as $image)
                    <img src="{{ asset('images/' . $image->path) }}" alt="{{ $listing->title }} image"
                        class=" pb-4 h-[400px] w-[1200px] object-cover rounded-xl">
                @endforeach
            </div>
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">{{ $listing->title }}</h1>
            </div>
            <div class="flex gap-2 mt-2">
                <p class="text-white p-2 bg-slate-500 rounded">Price Rs: {{ number_format($listing->price) }}</p>
                <p class="text-white p-2 bg-slate-500 rounded">Type: {{ $listing->property_type->name }}</p>
                <p class="text-white p-2 bg-slate-500 rounded">Availability: {{ $listing->availability }}</p>
                <p class="text-white p-2 bg-slate-500 rounded">Developer: {{ $listing->developer }}</p>
            </div>
            <div class="flex flex-wrap gap-2 mt-2 w-[800px]">
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Rooms: {{ $listing->bedrooms }}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Bathrooms: {{ $listing->bathrooms }}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Floors: {{ $listing->floors }}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Floor Aread: {{ $listing->floor_area }}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Land Area: {{ $listing->land_area }}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Parking Spaces: {{ $listing->car_parking_spaces}}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Furnishing Status: {{ $listing->furnishing_status}}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Age of Building: {{ $listing->age_of_building}}</p>
                <p class="text-white text-sm p-1 bg-gray-800 rounded">Width of Approach Road: {{ $listing->width_of_approach_road}}</p>
            </div>
        </div>
        

        <div class="mt-4  pt-10">
            <h2 class="text-2xl font-bold">Description</h2>
            <p class="text-gray-600 pt-2">{{ $listing->description }}</p>
        </div>


        <div class="mt-4">
            @livewire('bid-listings', ['id' => $listing->id, 'price' => $listing->price])
        </div>
    </article>



    @livewire('main-footer')
</body>

</html>
