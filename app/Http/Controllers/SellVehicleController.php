<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use App\Models\BuyingVehicle;
use App\Mail\BuyVehicle;
use App\Jobs\sellingVehicleJob;
use App\Notifications\SellVehicleNotify;
use App\Models\User;
class SellVehicleController extends Controller
{
    public function index(){
        $makers = Maker::latest()->get();
        return view('user.sell-vehicle',[
            'makers' => $makers
        ]);
    
    }
    public function store(Request $request){

        $request->validate([
            'seller_email' => 'required|email',
            'seller_name' => 'required',
            'seller_phone' => 'required',
            'seller_address' => 'required',
            'maker_id' => 'required',
            'model_name' => 'required',
            'model_year' => 'required',
            'displasement' => 'required',
            'mileage' => 'required',
            'chassis_no' => 'required',
            'inspection_expiry_date' => 'required',
            'photos' => 'required|max:4',
            'g-recaptcha-response' => 'required|captcha'
        ],[
            'seller_email.email' => "無効なメール",
            'seller_email.required' => "メールフィールドは必須です",
            'seller_name.required' => "販売者名フィールドは必須です",
            'seller_phone.required' => "売り手の電話フィールドは必須です",
            'seller_address.required' => "販売者の住所フィールドは必須です",
            'maker_id.required' => "メーカーフィールドが必要です",
            'model_name.required' => "モデル名フィールドは必須です",
            'model_year.required' => "モデルイヤーフィールドが必要です",
            'displasement.required' => "ディスプレイスメントフィールドが必要です",
            'mileage.required' => "マイレージフィールドは必須です",
            'chassis_no.required' => "シャーシ番号フィールドは必須です",
            'inspection_expiry_date.required' => "検査の有効期限フィールドは必須です",
            'photos.required' => "写真フィールドは必須です",
            'photos.max' => "アップロードできる写真は最大4枚",
            'g-recaptcha-response.required' => 'あなたがロボットではないことを確認してください。',
            'g-recaptcha-response.captcha' => 'キャプチャエラー！後で再試行するか、サイト管理者に連絡してください。'
        ]
    );

        $data = new BuyingVehicle();

        if($request->hasfile('photos')) {
            $request->file('photos');
            foreach($request->file('photos') as $file)
            {
                $name = time(). '.' .$file->getClientOriginalName();
                $file->move('storage/sell-vehicles/', $name);
                $imgData[] = $name;  
            }
        }
          
            $data->seller_email = request('seller_email');
            $data->seller_name = request('seller_name');
            $data->seller_phone = request('seller_phone');
            $data->seller_fax = request('seller_fax');
            $data->seller_address = request('seller_address');
            $data->maker_id = request("maker_id");
            $data->model_name = request("model_name");
            $data->model_year = request("model_year");
            $data->displasement = request("displasement");
            $data->mileage = request("mileage");
            $data->chassis_no = request("chassis_no");
            $data->inspection_expiry_date = request("inspection_expiry_date");
            $data->photos = implode('|', $imgData);
            $data->save();
            
            $users = User::all();
            \Notification::send($users, new SellVehicleNotify());
            dispatch(new sellingVehicleJob($data)); 
           
            return back()->with('status1', '正常に送信されました!');


  }

  
}
