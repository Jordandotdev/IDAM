<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\LocationType;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Listing::factory(10)->create();

        \App\Models\Listing::factory()->create([
            'location_type' => 7,
            'title'=> 'House for sale',
            'description' => 'Cool house for sale',
            'price' => 100000,
        ]);
    }
}
