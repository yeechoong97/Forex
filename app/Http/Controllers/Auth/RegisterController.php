<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Account;
use App\Common;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest');
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
            'username' => 'required|string|max:20|unique:users',
            'name' => 'required|string|max:50',
            'phone' => 'required|min:10|max:11',
            'avatar' => 'required',
            'email' => 'required|string|email|max:25',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $lastRecordID = User::orderBy('id','desc')->first();
        $userID = (!$lastRecordID) ? "EST1" : "EST".($lastRecordID->id + 1);

        $account = new Account();
        $account->user_id = $userID;
        $account->balance = 50000.00;
        $account->margin = 50000.00;
        $account->margin_used = 0.00;
        $account->leverage = "30 : 1" ;
        $account->save();

        $avatar = "";
        foreach(Common::$avatarLists as $key => $value)
        $avatar = ($data['avatar']==$value) ? $key : $avatar;

        return User::create([
            'user_id' => $userID,
            'name' => $data['name'],
            'avatar' => $avatar,
            'phone' => $data['phone'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
