<div class="p-8">
    <section
        class="rounded-lg bg-center bg-no-repeat bg-cover bg-[url('https://i.pinimg.com/564x/13/64/b3/1364b3cf51eb82e47f03e00a0e72450c.jpg')] bg-gray-600 bg-blend-multiply">
        <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            <div class="px-4 mx-auto max-w-screen-xl text-left lg:py-16">
                <h1
                    class="max-w-7xl mx-auto p-6 lg:p-8 mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    Buy, Sell and Rent your property in one Place!
                </h1>
                <p class="px-6 mb-8 text-xl font-normal text-gray-300 lg:text-l">
                    Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term
                    value and drive economic growth.
                </p>
            </div>
        </div>

        <div class="relative top-16">
            @livewire('property-search-bar')
            </dvi>
    </section>

    {{-- Featured Porperties section --}}
    <section class="px-6 mt-24 ">

        <div>
            <h2 class="text-3xl font-bold text-gray-800">Featured Properties</h2>
        </div>


        {{-- @foreach ($listings as $listing)
            @livewire('thumbnail-property-card', [
                    'text1' => $listing->title, 
                    'text2' => $listing->description, 
                    'text3' => $listing->price,
                ])
        @endforeach --}}

    </section>

    {{-- section --}}
    <section class="p-6 mt-14 rounded-lg bg-pink-100">

        <div>
            <h2 class=" text-3xl font-bold text-gray-800">About Us</h2>
        </div>

        <div class="flex flex-row gap-16">
            <p class="mt-4 w-1/2 text-lg font-normal text-gray-600 tracking-tight">
                Idam is a dynamic real estate enterprise revolutionizing the property market landscape, offering an
                all-encompassing platform facilitating seamless transactions for buying, selling, and renting
                properties. Our cutting-edge approach integrates innovative technology, strategic market insights, and
                robust capital resources to unlock enduring value and catalyze economic prosperity. With Idam, users not
                only engage in traditional property transactions but also harness the power to bid for rental agreements
                and dynamically negotiate house prices, empowering individuals and businesses alike 
            </p>

            <div class="flex flex-wrap mt-4 pb-4 gap-4 justify-left">
                @livewire('info-bubble', ['text1' => '+20k', 'text2' => 'Customers', 'color' => 'fill-red-300'])
                @livewire('info-bubble', ['text1' => '+300', 'text2' => 'Properties', 'color' => 'fill-pink-300'])
                @livewire('info-bubble', ['text1' => '+200', 'text2' => 'Million Revenue', 'color' => 'fill-blue-300'])
            </div>
        </div>



    </section>

</div>
