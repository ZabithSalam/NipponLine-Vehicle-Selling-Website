<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    Protected $table ="vehicles";
    use HasFactory;

    public function maker()
    {
        return $this->belongsTo(Maker::class, 'vehicle_maker_id');
    }

    public function getRouteKeyName()
    {
        return 'vehicle_name';
    }


}
