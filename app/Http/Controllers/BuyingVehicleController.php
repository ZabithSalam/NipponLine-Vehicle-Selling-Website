<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuyingVehicle;
use \Carbon\Carbon;
use DB;

class BuyingVehicleController extends Controller
{
    public function index(){
        $buying_vehicles = BuyingVehicle::latest()->get();
        return view('admin.buying-vehicles',[
            'buying_vehicles' => $buying_vehicles
        ]);

    }
    public function find($id){

        $vehicle = BuyingVehicle::find($id);
        $vehicle->read_at = Carbon::now(); 
        $vehicle->update();
        return view('admin.buyingvehicle-details', compact('vehicle'));
        
    }
    public function delete($id)
    {
        $vehicle = BuyingVehicle::find($id);
        $images = explode('|', $vehicle->photos);
        foreach($images as $img){
            unlink(public_path('storage/sell-vehicles/').$img);
        }
        $vehicle->delete();
        return redirect()->back()->with('status11', 'Deleted Successfully');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $vehicles = BuyingVehicle::whereIn('id', $ids)->get();
        BuyingVehicle::whereIn('id', $ids)->delete();
        foreach ($vehicles as $vehicle) {
            $currentPhoto = explode('|', $vehicle->photos);
            foreach($currentPhoto as $cphoto){
                $VehiclePhoto = (public_path('storage/sell-vehicles/').$cphoto);
                if(file_exists($VehiclePhoto)){
                    @unlink($VehiclePhoto);
                }
                else{
                    echo 'not exist';
                }
            }
        }
        return redirect()->back()->with('status11', 'Deleted Successfully');

    }
}
