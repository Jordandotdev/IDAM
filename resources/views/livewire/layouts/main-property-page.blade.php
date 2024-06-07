<div>
    <article class="flex gap-2 mx-auto px-4 py-2 mt-1 pt-4 bg-gray-200">

        {{-- Featured Properties --}}
        <section class="px-4 py-4 bg-white pt-4 shadow-xl sm:rounded-lg">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Featured Properties</h2>
            <div class="grid grid-cols-3 gap-4">
            @foreach ($listings as $listing)
                <x-property.large-property-card :listing="$listing" />
            @endforeach
            </div>
        </section>

        {{-- More Properties --}}
        <section class="px-4 py-4 bg-white pt-4 shadow-xl sm:rounded-lg">
            <div class="grid gap-3">
                @foreach ($listings as $listing)
                    <x-property.property-card :listing="$listing" />
                @endforeach
            </div>
        </section>
    </article>
</div>
