<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    protected $model = Listing::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2,   10,   100),
            'location_type' => $this->faker->numberBetween(1,   10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}