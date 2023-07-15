<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyingVehicle extends Model
{
    Protected $table ="buying_vehicles";
    use HasFactory;

    public function maker()
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }

    public function getRouteKeyName()
    {
        return 'seller_name';
    }
}
