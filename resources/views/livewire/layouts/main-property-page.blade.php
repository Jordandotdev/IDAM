<div>
    <article  class="container mx-auto px-4 mt-1 pt-4">

        {{-- Lisitng Carousel --}}
        {{-- <section class="px-4 sm:px-6 lg:px-8 bg-white pt-4 shadow-xl sm:rounded-lg">
            <div class="relative w-full" data-carousel="slide">
                
                <div class="relative h-[30em] overflow-hidden rounded-2xl shadow-2xl">
                    
                    @foreach($featuredPosts as $index => $post)
                        @if($post->Approval)
                            <a href="{{ route('post.show', $post->slug) }}" class="rounded-2xl hidden duration-500 ease-in-out transform translate-x-full" data-carousel-item>
                                <img src="{{ $post->getThumbnail() }}" class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition-all duration-700 ease-in-out" alt="Post Image">
                                <div class="absolute top-0 left-0 right-1/2 p-4 rounded-br-[5em] bg-primary text-white transition duration-300 ease-in-out">
                                    <h2 class="px-7 text-xl lg:text-4xl font-bold tracking-wide leading-tight transition duration-300 ease-in-out transform">{{ \Illuminate\Support\Str::limit($post->title, 30) }}</h2>
                                    <p class="px-7 font-bold text-lg opacity-75 transition duration-300 ease-in-out transform">By {{ $post->author->name }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                
                <div class="absolute top-1/2 -translate-y-1/2 right-5 flex flex-col justify-center items-center space-y-3 z-40">
                    @foreach($featuredPosts as $index => $post)
                        @if($post->Approval)
                            <button type="button" class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-blue-600' : 'bg-gray-300' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                        @endif
                    @endforeach
                </div>
                
                <button type="button" class="absolute bottom-4 right-4 z-30 flex items-center justify-center w-12 h-12 bg-black/80 rounded-r-lg transition duration-300 ease-in-out transform hover:scale-90 focus:outline-none text-white hover:text-primary" data-carousel-next>
                    <svg class="w-6 h-6 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </button>
                <button type="button" class="click-effect absolute bottom-4 right-20 z-30 flex items-center justify-center w-12 h-12 bg-black/80 rounded-l-lg transition duration-300 ease-in-out transform hover:scale-90 focus:outline-none text-white hover:text-primary" data-carousel-prev>
                    <svg class="w-6 h-6 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </button>
            </div>
        </section> --}}

        {{-- Featured Properties --}}
        <section class="px-4 sm:px-6 lg:px-8 bg-white pt-4 shadow-xl sm:rounded-lg">
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8" x-data="{ cards: Array(1).fill() }">
                    <template x-for="(card, index) in cards" :key="index">
                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#" class="overflow-hidden">
                                <img class="rounded-t-lg transform transition-all duration-500 hover:object-scale-down"
                                    src="https://i.pinimg.com/564x/0d/4e/0a/0d4e0a7ec2efee19a4dafa811051f854.jpg"
                                    alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest
                                    enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                                </p>
                                <a href="#"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        {{-- More Properties --}}
        <section class="px-4 sm:px-6 lg:px-8 bg-white pt-4 shadow-xl sm:rounded-lg">

        </section>
    </article>
</div>
