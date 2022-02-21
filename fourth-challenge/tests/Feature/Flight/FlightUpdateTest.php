<?php

namespace Tests\Feature\Flight;

use App\Http\Controllers\FlightController;
use App\Models\City;
use App\Models\Company;
use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightUpdateTest extends TestCase
{
    use RefreshDatabase;


    public function test_existing_flight_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $newCompany = Company::factory()->create();
        $newOrigin = City::factory()->create();
        $newDestination = City::factory()->create();
        $newTime = time();

        $flight = Flight::factory()->create();

        $this
            ->put(action([FlightController::class, 'update'],$flight->id),[
                'origin_city_id' => $newOrigin['id'],
                'destination_city_id' => $newDestination['id'],
                'company_id' => $newCompany['id'],
                'departure' => $newTime,
                'arrival' => $newTime
            ]);

        $this->assertDatabaseHas(Flight::class,[
            'origin_city_id' => $newOrigin['id'],
            'destination_city_id' => $newDestination['id'],
            'company_id' => $newCompany['id'],
            'departure' => $newTime,
            'arrival' => $newTime
        ]);
    }
}
