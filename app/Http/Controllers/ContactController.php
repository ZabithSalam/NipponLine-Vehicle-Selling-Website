<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Jobs\ContactJob;


class ContactController extends Controller
{
    public function index(){

        return view('user.contact');
    
    }
    public function store(Request $request){

        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ],[
            'email.required' => "メールフィールドは必須です",
            'email.email' => "無効なメール",
            'name.required' => "名前フィールドは必須です",
            'message.required' => "メッセージフィールドは必須です",
            'g-recaptcha-response.required' => 'あなたがロボットではないことを確認してください。',
            'g-recaptcha-response.captcha' => 'キャプチャエラー！後で再試行するか、サイト管理者に連絡してください。'
        ]);
         $data=collect($request->all());
        dispatch(new ContactJob($data)); 
        return back()->with('status2', '送信に成功しました');
            //dd($request->all());
    }
    
}
