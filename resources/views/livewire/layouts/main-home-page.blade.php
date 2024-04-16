<div class="p-8">
    <section class=" bg-center bg-no-repeat bg-cover bg-[url('https://i.pinimg.com/564x/13/64/b3/1364b3cf51eb82e47f03e00a0e72450c.jpg')] bg-gray-600 bg-blend-multiply">
        <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">  
         
            <div class="px-4 mx-auto max-w-screen-xl text-left lg:py-16">
                <h1 class="max-w-7xl mx-auto p-6 lg:p-8 mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    Buy, Sell and Rent your property in one Place!
                </h1>
                <p class="px-6 mb-8 text-xl font-normal text-gray-300 lg:text-l">
                    Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.
                </p>
            </div>
        </div>    

        <div  class="relative top-16">
            @livewire('property-search-bar')
        </dvi>
    </section>

    {{-- Featured Porperties section --}}
    <section class="px-6 mt-24 ">

        <div>
            <h2 class="text-3xl font-bold text-gray-800">Featured Properties</h2>
        </div>

        <div class="flex flex-row mt-4 gap-4 justify-left">      
            @livewire('thumbnail-property-card')
            @livewire('thumbnail-property-card')
            @livewire('thumbnail-property-card')
            @livewire('thumbnail-property-card')
            @livewire('thumbnail-property-card')  
        </div>

    </section>

    {{-- section --}}
    <section class="px-6 mt-14">

        <div>
            <h2 class="text-3xl font-bold text-gray-800">About Us</h2>
        </div>

        <div class="flex flex-row mt-4 gap-4 justify-center">      
           @livewire('info-bubble') 
        </div>

    </section>
    
</div>
