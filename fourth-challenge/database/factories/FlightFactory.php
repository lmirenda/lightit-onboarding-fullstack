<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'origin_city_id' => City::factory(),
            'destination_city_id' => City::factory(),
            'company_id' => Company::factory(),
            'departure' => now(),
            'arrival' => now()
        ];
    }
}