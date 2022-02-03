<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        $suffix = [' Corp.', ' Inc.', ' PBC', ' Ltd.', ' Co.', ' Airways', ' Airline'];
        return [
            'name' => $this->faker->company() . $suffix[rand(0,count($suffix)-1)]
        ];
    }

    public function company() 
    {

    }

}
