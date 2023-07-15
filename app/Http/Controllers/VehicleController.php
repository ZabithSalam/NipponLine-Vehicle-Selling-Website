<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use App\Models\Vehicle;
use Illuminate\Support\Facades\File;

class VehicleController extends Controller
{
    public function index(Request $request){

        $all_makers = Maker::latest()->get();
        $vehicles = Vehicle::latest()->paginate(15);
        return view('user.vehicles', compact('all_makers', 'vehicles'));

    }
    public function searchVehicle(Maker $maker){

        
        $vehicles = Vehicle::latest()->paginate(15);
        $votesInGroups = Vehicle::where('vehicle_maker_id',$maker->id)->With('maker')->groupBy('vehicle_maker_id');
        $all_makers = Maker::latest()->get();
        return view('user.search-by-maker', compact('maker', 'all_makers', 'vehicles', 'votesInGroups'));

    }
    public function findVehicle(Vehicle $vehicle){

        return view('user.vehicle-details', compact('vehicle'));

    }

    public function adminIndex(Request $request){

        $makers = Maker::latest()->get();
        $vehicles = Vehicle::latest()->get();
        return view('admin.manage-vehicles',[
            'makers' => $makers,
            'vehicles' => $vehicles
        ]);

    }
    public function store(Request $request){

        $request->validate([
            'vehicle_image' => 'max:6',
            
        ],[
            'vehicle_image.max' => "Maximum 6 Photos you can upload",
        ]
    );
          if($request->hasfile('vehicle_image')) {
            $request->file('vehicle_image');
              foreach($request->file('vehicle_image') as $file)
              {
                  $name = time(). '.' .$file->getClientOriginalName();
                  $file->move('storage/vehicles/', $name);
                  $imgData[] = $name;  
              }
          }
            
              $fileModal = new Vehicle();
              $fileModal->vehicle_name = request('vehicle_name');
              $fileModal->vehicle_price = request("vehicle_price");
              $fileModal->vehicle_model_year = request("vehicle_model_year");
              $fileModal->vehicle_maker_id = request("vehicle_maker_id");
              $fileModal->vehicle_displacement = request("vehicle_displacement");
              $fileModal->vehicle_Mileage = request("vehicle_Mileage");
              $fileModal->vehicle_inspection = request("vehicle_inspection");
              $fileModal->vehicle_repire_history = request("vehicle_repire_history");
              $fileModal->vehicle_body_color = request("vehicle_body_color");
              $fileModal->vehicle_riding_capacity = request("vehicle_riding_capacity");
              $fileModal->vehicle_transmission = request("vehicle_transmission");
              $fileModal->vehicle_legal_inspection = request("vehicle_legal_inspection");
              $fileModal->vehicle_guarantee = request("vehicle_guarantee");
              $fileModal->vehicle_registered_un_used = request("vehicle_registered_un_used");
              $fileModal->vehicle_recycling_deposite = request("vehicle_recycling_deposite");
              $fileModal->vehicle_import_route = request("vehicle_import_route");
              $fileModal->vehicle_body_type = request("vehicle_body_type");
              $fileModal->vehicle_steering = request("vehicle_steering");
              $fileModal->vehicle_chassis_no = request("vehicle_chassis_no");
              $fileModal->vehicle_engine_type = request("vehicle_engine_type");
              $fileModal->vehicle_no_of_doors = request("vehicle_no_of_doors");
              $fileModal->vehicle_wheight = request("vehicle_wheight");
              $fileModal->vehicle_body_dimension = request("vehicle_body_dimension");
              $fileModal->vehicle_type = request("vehicle_type");
              $fileModal->description = request("description");
              $fileModal->use = request("use");
              $fileModal->vehicle_image = implode('|', $imgData);
              $fileModal->save();
             return back()->with('status8', 'successfully Added!');


    }
    public function edit(Vehicle $vehicle){
        $makers = Maker::latest()->get();
        return view("admin.edit-vehicle",[
            'makers' => $makers,
            'vehicle' => $vehicle
        ]);
    }
    public function update($id, Request $request){
            $edit_vehicle = Vehicle::find($id);

            $request->validate([
                'vehicle_image' => 'max:6',
                
            ],[
                'vehicle_image.max' => "Maximum 6 Photos you can upload",
            ]
        );
        if($request->hasfile('vehicle_image')) {
            foreach($request->file('vehicle_image') as $file)
            {
                $name = time(). '.' .$file->getClientOriginalName();
                $file->move('storage/vehicles/', $name);
                $imgData[] = $name;  
            }
            $images = explode('|', $edit_vehicle->vehicle_image);
            foreach($images as $img){
                File::delete('storage/vehicles/'.$img);
            }
            $edit_vehicle->vehicle_image = implode('|', $imgData);

        }
           
            $edit_vehicle->vehicle_name = request('vehicle_name');
            $edit_vehicle->vehicle_price = request("vehicle_price");
            $edit_vehicle->vehicle_model_year = request("vehicle_model_year");
            $edit_vehicle->vehicle_maker_id = request("vehicle_maker_id");
            $edit_vehicle->vehicle_displacement = request("vehicle_displacement");
            $edit_vehicle->vehicle_Mileage = request("vehicle_Mileage");
            $edit_vehicle->vehicle_inspection = request("vehicle_inspection");
            $edit_vehicle->vehicle_repire_history = request("vehicle_repire_history");
            $edit_vehicle->vehicle_body_color = request("vehicle_body_color");
            $edit_vehicle->vehicle_riding_capacity = request("vehicle_riding_capacity");
            $edit_vehicle->vehicle_transmission = request("vehicle_transmission");
            $edit_vehicle->vehicle_legal_inspection = request("vehicle_legal_inspection");
            $edit_vehicle->vehicle_guarantee = request("vehicle_guarantee");
            $edit_vehicle->vehicle_registered_un_used = request("vehicle_registered_un_used");
            $edit_vehicle->vehicle_recycling_deposite = request("vehicle_recycling_deposite");
            $edit_vehicle->vehicle_import_route = request("vehicle_import_route");
            $edit_vehicle->vehicle_body_type = request("vehicle_body_type");
            $edit_vehicle->vehicle_steering = request("vehicle_steering");
            $edit_vehicle->vehicle_chassis_no = request("vehicle_chassis_no");
            $edit_vehicle->vehicle_engine_type = request("vehicle_engine_type");
            $edit_vehicle->vehicle_no_of_doors = request("vehicle_no_of_doors");
            $edit_vehicle->vehicle_wheight = request("vehicle_wheight");
            $edit_vehicle->vehicle_body_dimension = request("vehicle_body_dimension");
            $edit_vehicle->vehicle_type = request("vehicle_type");
            $edit_vehicle->description = request("description");
            $edit_vehicle->use = request("use");
            $edit_vehicle->update();
           return redirect('/admin/manage-vehicle')->with('status9', 'successfully updated!');


  }
    public function delete($id)
    {
        $vehicle = Vehicle::find($id);
        $images = explode('|', $vehicle->vehicle_image);
        foreach($images as $img){
            unlink(public_path('storage/vehicles/').$img);
        }
        $vehicle->delete();
        return redirect()->back()->with('status10', 'Deleted Successfully');
    }
    
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $vehicles = Vehicle::whereIn('id', $ids)->get();
        Vehicle::whereIn('id', $ids)->delete();
        foreach ($vehicles as $vehicle) {
            $currentPhoto = explode('|', $vehicle->vehicle_image);
            foreach($currentPhoto as $cphoto){
                $VehiclePhoto = (public_path('storage/vehicles/').$cphoto);
                if(file_exists($VehiclePhoto)){
                    @unlink($VehiclePhoto);
                }
                else{
                    echo 'not exist';
                }
            }
        }
        return redirect()->back()->with('status10', 'Deleted Successfully');

    }
}
