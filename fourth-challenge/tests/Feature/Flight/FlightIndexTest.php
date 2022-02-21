<?php

namespace Tests\Feature\Flight;

use App\Models\City;
use App\Models\Company;
use Tests\TestCase;
use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlightIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_shows_a_table_of_flights()
    {
        $this->withoutDeprecationHandling();
        $company = Company::factory()->create();
        $origin = City::factory()->create();
        $destination = City::factory()->create();

        Flight::factory()->create([
            'name' => 'Test Flight',
            'origin_city_id' => $origin['id'],
            'destination_city_id' => $destination['id'],
            'company_id' => $company['id'],
            'arrival' => '2022-02-04 20:41:45',
            'departure' => '2022-02-03 20:41:45'
        ]);

        $this
            ->get('/list/flights/')
            ->assertSuccessful()
            ->assertSee([
                $origin->name,
                $destination->name,
                $company->name,
                '2022-02-03 20:41:45',
                '2022-02-04 20:41:45',
                ]);
        // ->assertSeeInOrder(
        //     [
        //         'Kautzer LLC Airways',
        //         'Daniel and Sons Airline'
        //     ]
        // );
    }
}
