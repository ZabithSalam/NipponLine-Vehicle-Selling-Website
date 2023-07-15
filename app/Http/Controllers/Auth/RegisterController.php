<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register()
    {
        $newuser = new User();
        $newuser->role = request('role'); 
        $newuser->name = request('name'); 
        $newuser->email = request('email'); 
        $newuser->password = Hash::make(request('password'));
        $newuser->save();
        return redirect()->back()->with('status1', 'Registration Successful');
    }
    public function showRegistrationForm()
    {
        if(Auth::user()->role == "superAdmin"){

            $users = User::latest()->get();
            return view('auth.register', compact('users'));

        }
        else{
            return redirect()->back();
        }  
    }
    public function edit(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }
    public function update($id){
            
        $edit_user = User::find($id);
        $edit_user->name = request('name'); 
        $edit_user->email = request('email'); 
        $edit_user->role = request('role'); 
        $edit_user->email_verified_at = request('email_verified_at'); 
        $edit_user->save();
        return redirect()->back()->with('status3', 'Updated successully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('status2', 'Deleted Successfully');
    }

}
