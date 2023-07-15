<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use Illuminate\Support\Facades\File;

class ManageMakersController extends Controller
{

    public function index(){
        $makers = Maker::latest()->get();
        return view('admin.manage-makers', [
            'makers' =>$makers
        ]);
        
    }
    public function store(Request $request){
            $maker = new Maker();
            if($request->file('maker_image')){
                $file= $request->file('maker_image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('makers', $filename, 'public');
                $maker['maker_image']= $filename;
            }
            $maker->maker_name = request('maker_name');
            $maker->save();
            
            return redirect()->back()->with('status6', 'Added successully');

    }
    public function edit(Maker $maker)
    {
        return view('admin.edit_maker', compact('maker'));
    }
    public function update(Request $request, $id){
            
        $edit_maker = Maker::find($id);
        $edit_maker->maker_name = request('maker_name'); 
        if($request->hasfile('maker_image')){
            $file= $request->file('maker_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            
            if(File::exists('storage/makers/'.$edit_maker->maker_image)){
                File::delete('storage/makers/'.$edit_maker->maker_image);
            }
            
            $file->move('storage/makers/', $filename);
            $edit_maker->maker_image = $filename;
        }
        $edit_maker->update();
        return redirect('/admin/manage-makers')->with('status4', 'Updated successully');
    }
    public function delete($id)
    {
        $maker = Maker::find($id);
        File::delete('storage/makers/'.$maker->maker_image);
        $maker->delete();

        return redirect()->back()->with('status5', 'Deleted Successfully');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $makers = Maker::whereIn('id', $ids)->get();
        Maker::whereIn('id', $ids)->delete();
        foreach ($makers as $maker) {
            $currentPhoto = $maker->maker_image;
                $VehiclePhoto = (public_path('storage/makers/').$currentPhoto);
                if(file_exists($VehiclePhoto)){
                    @unlink($VehiclePhoto);
                }
                else{
                    echo 'not exist';
                }
        }
        return redirect()->back()->with('status5', 'Deleted Successfully');

    }
}
