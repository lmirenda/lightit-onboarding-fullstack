<?php

namespace App\Models;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['company', 'origin', 'destination'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // TODO: 
    public function origin()
    {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    public function destination()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }
}
