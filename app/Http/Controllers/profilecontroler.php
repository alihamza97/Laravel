<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Role;
use Illuminate\Support\Facades\DB;

class profilecontroler extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth:web,admin');

    }
    //this function is for updating profile picture for both admin and user.
    public function update_avatar(Request $request){

        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('images/avatar/' . $filename));

            $user=Auth::user();
            $user->avatar=$filename;
            $user->save();
        }
        return view('pages/profile',array('user'=>Auth::user()));
    }

    public function index()
    {
//      $users =User::all();
        $user=Auth::User();
        $user->roles()->attach(Role::where('name', 'User')->first());
        return view('pages/profile')->with ('user',$user);
    }

    public function giveRole(){
        $user = Auth::User();
        $user->roles()->attach(Role::where('name', 'User')->first());
        return view('main');
    }
}
