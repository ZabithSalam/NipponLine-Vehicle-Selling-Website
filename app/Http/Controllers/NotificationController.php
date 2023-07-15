<?php

namespace App\Http\Controllers;

use App\Models\BuyingVehicle;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Models\User;

class NotificationController extends Controller
{
    public function markasread(){
        auth()->user()->unreadnotifications->markAsRead();
        return redirect('/admin/buying-vehicles');
    }
    public function update($id){
            
        $read_at = BuyingVehicle::find($id);
        $read_at->read_at = Carbon::now(); 
        $read_at->update();
        return back();
    }
    public function delete(){
            
        auth()->user()->readNotifications()->delete();
        return back()->with('statusread', 'Cleared Successfully');
    }
}
