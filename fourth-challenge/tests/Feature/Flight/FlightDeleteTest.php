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

        $flight = Flight::factory()->create();

        $this->delete(action([FlightController::class, 'destroy'],$flight->id));

        $this->assertModelMissing($flight);
    }
}
