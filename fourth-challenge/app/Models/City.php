<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function arrivingFlight() 
    {
        return $this->hasMany(Flight::class, 'destination_city_id');
    }
    public function departingFlight() 
    {
        return $this->hasMany(Flight::class, 'origin_city_id');
    }
    public function totalFlights()
    {
        // TODO concatenate arriving and departing flights.
    }
}
