<div class=" w-1/2 px-6">

    <div class="flex flex-row items-center mb-1 gap-2">
        <h1 class=" pl-2 text-xl font-bold text-white ">
            Quick Search
        </h1>
        <svg class="w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="white"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>
        </svg>
    </div>

    <section class=" p-8 bg-gray-800 grid grid-cols-4 gap-6 lg:gap-8 rounded-lg shadow-2xl shadow-gray-900">        

        <form class="max-w-sm mx-auto">
            <label for="countries" class="block mb-2 text-sm font-medium text-white dark:text-white">Looking For</label>
            <select id="countries" class="mr-8 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Select Country</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
            </select>
        </form>
        
        <form class="max-w-sm mx-auto">
            <label for="cities" class="block mb-2 text-sm font-medium text-white dark:text-white">City</label>
            <select id="cities" class="mr-8 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Select City</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
            </select>
        </form>
        
        <form class="max-w-sm mx-auto">
            <label for="priceLimit" class="block mb-2 text-sm font-medium text-white dark:text-white">Price Limit</label>
            <select id="priceLimit" class="mr-8 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Select Price Limit</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
            </select>
        </form>

        <a href="#" class="inline-flex justify-center items-center px-3 py-2 text-2xl font-bold text-center text-black bg-orange-100 rounded-lg hover:bg-gray-900 hover:text-orange-100 focus:ring-4  focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Search
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>

    </section>
</div>
