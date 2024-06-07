<div>
    <article  class="container mx-auto px-4 mt-1 pt-4">

        <section class="px-4 sm:px-6 lg:px-8 bg-white pt-4 shadow-xl sm:rounded-lg">

        </section>

        <section class="px-4 sm:px-6 lg:px-8 bg-white pt-4 shadow-xl sm:rounded-lg">
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8" x-data="{ cards: Array(6).fill() }">
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

        <section class="px-4 sm:px-6 lg:px-8 bg-white pt-4 shadow-xl sm:rounded-lg">

        </section>
    </article>
</div>