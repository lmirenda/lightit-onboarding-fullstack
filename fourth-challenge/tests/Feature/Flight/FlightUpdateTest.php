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

        $oldCompany = Company::factory()->create();
        $oldOrigin = City::factory()->create();
        $oldDestination = City::factory()->create();

        $newCompany = Company::factory()->create();
        $newOrigin = City::factory()->create();
        $newDestination = City::factory()->create();

        $flight = Flight::factory()->create([
            'origin_city_id' => $oldOrigin['id'],
            'destination_city_id' => $oldDestination['id'],
            'company_id' => $oldCompany['id'],
            'departure' => time(),
            'arrival' => time()
        ]);

        $this
            ->put(action([FlightController::class, 'update'],$flight->id),[
                'origin_city_id' => $newOrigin['id'],
                'destination_city_id' => $newDestination['id'],
                'company_id' => $newCompany['id'],
                'departure' => time(),
                'arrival' => time()
            ]);

        $this->assertDatabaseHas(Flight::class,[
            'origin_city_id' => $newOrigin['id'],
            'destination_city_id' => $newDestination['id'],
            'company_id' => $newCompany['id']
        ]);
    }
}
