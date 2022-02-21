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
            ->post(action(FlightController::class, 'store'),[
            'name' => 'Test Flight',
            'origin_city_id' => $this->$origin['id'],
            'destination_city_id' => $this->$destination['id'],
            'company_id' => $this->$company['id'],
            'departure' => time(),
            'arrival' => time()
            ])
            ->assertStatus(302);

        $this->assertDatabaseHas(Flight::class,[
            'name' => 'Test Flight',
            'origin_city_id' => $this->$origin['id'],
            'destination_city_id' => $this->$destination['id'],
            'company_id' => $this->$company['id']
        ]);
    }
}
