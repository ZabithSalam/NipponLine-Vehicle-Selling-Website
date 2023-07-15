<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use App\Models\Ad;
use App\Models\Vehicle;

class IndexController extends Controller
{
    public function index(){
        $makers = Maker::latest()->get();
        $ads = Ad::latest()->get();
        $new_vehicles = Vehicle::latest()->take(4)->get();
        $vehicles = Vehicle::paginate(8)->all();
        return view('user.index',[
            'makers' => $makers,
            'ads' => $ads,
            'new_vehicles' => $new_vehicles,
            'vehicles' => $vehicles,
        ]);
    }
    
    
}
