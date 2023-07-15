<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\File;

class AdController extends Controller
{
    public function index(){

        $ads =Ad::latest()->get();
        return view('admin.ad', compact('ads'));
        
    }
    public function store(Request $request){
        $ad = new Ad();
        if($request->file('banner_ad')){
            $file= $request->file('banner_ad');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('advertisements', $filename, 'public');
            $ad['banner_ad']= $filename;
        }
        $ad->save();
        
        return redirect()->back()->with('status12', 'Added successully');

    }    
    public function delete($id)
    {
        $ad = Ad::find($id);
        File::delete('storage/ads/'.$ad->ad);
        $ad->delete();

        return redirect()->back()->with('status13', 'Deleted Successfully');
    }  
}
