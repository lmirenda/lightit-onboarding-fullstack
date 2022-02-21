<?php

namespace Tests\Feature\Flight;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightIndexTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    public function index_shows_a_table_of_flights()
    {
        $this->withoutDeprecationHandling();
        $this
            ->get('/list/flights/')
            ->assertSuccessful()
            ->assertSee('Ruecker Group Airways')
            ->assertSeeInOrder(
                [
                    'Kautzer LLC Airways',
                    'Daniel and Sons Airline'
                ]
            );
    }
}
