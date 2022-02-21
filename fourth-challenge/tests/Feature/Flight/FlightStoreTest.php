<?php

namespace Tests\Feature\Flight;

use App\Http\Controllers\FlightController;
use App\Models\City;
use App\Models\Company;
use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightStoreTest extends TestCase
{
    use RefreshDatabase;


    public function test_new_flight_can_be_submitted()
    {
        $this->withoutExceptionHandling();

        $company = Company::factory()->create();
        $origin = City::factory()->create();
        $destination = City::factory()->create();

        $this
            ->post(action([FlightController::class, 'store']),[
            'origin_city_id' => $origin['id'],
            'destination_city_id' => $destination['id'],
            'company_id' => $company['id'],
            'departure' => time(),
            'arrival' => time()
            ]);

        $this->assertDatabaseHas(Flight::class,[
            'origin_city_id' => $origin['id'],
            'destination_city_id' => $destination['id'],
            'company_id' => $company['id']
        ]);
    }
}
