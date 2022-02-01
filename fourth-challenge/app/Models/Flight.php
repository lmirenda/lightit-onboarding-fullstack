<?php

namespace App\Models;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function origin()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function destination()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
