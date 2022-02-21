<?php

namespace Tests\Feature\Flight;

use App\Http\Controllers\FlightController;
use App\Models\City;
use App\Models\Company;
use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightDeleteTest extends TestCase
{
    use RefreshDatabase;


    public function test_existing_flight_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $company = Company::factory()->create();
        $origin = City::factory()->create();
        $destination = City::factory()->create();

        $flight = Flight::factory()->create([
            'origin_city_id' => $origin['id'],
            'destination_city_id' => $destination['id'],
            'company_id' => $company['id'],
            'departure' => time(),
            'arrival' => time()
        ]);

        $this
            ->delete(action([FlightController::class, 'destroy'],$flight->id));

        $this->assertDatabaseMissing(Flight::class,[
            'origin_city_id' => $origin['id'],
            'destination_city_id' => $destination['id'],
            'company_id' => $company['id']
        ]);
    }
}
