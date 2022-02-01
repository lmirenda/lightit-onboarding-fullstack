<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Flight;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
 
        // $company = Company::factory()->create([
        //     'name' => 'American Airlines'
        // ]);
        
        // $city = City::factory(10)->create();

        Flight::factory(15)->create();
    }
}
