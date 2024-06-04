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
                    <div class="flex justify-between items-center">
                        <h1 class="text-3xl font-bold">{{$listing->title}}</h1>
                    </div>
                    <p class="text-gray-600">Rs: {{$listing->price}}</p>
                    <p class="text-gray-600">{{$listing->description}}</p>
                    <p class="text-gray-600">{{$listing->property_type->name}}</p>    
                </div>

                @livewire('bid-listings')

            </article>

            

            @livewire('main-footer')

    </body>
</html>