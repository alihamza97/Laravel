<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    //this  function give access to both  user and admin to admin panel
    //2 different guards have been configured in config/auth.php
    ///in middleware/RedirectifAuthenticated there is a function to hadle these guards
    public function __construct()
    {

       $this->middleware('auth:web,admin');

    }

    public function index()
    {
        return view('admin');
    }
    //this function get users from database
    public function getUser()
    {

        $Users= User::all();
        return view('pages.AdminPanel',compact('Users'));

    }
    //this function delete the user from admin panel
    public function deleteUser($id)
    {
        $Users = User::find($id);
        $Users->delete();
        return redirect('/AdminPanel');
    }
    //this function find the user and redirect to the updateUser page
    public function updateUser($id){
        $User = User::find($id);
            return view('pages.updateUser',compact('User'));

    }
    public  function find(){
        return view('pages.profile',array('user'=>Auth::user()));

    }
    //this function update the user accordint to the user id
    public function updatedUser(Request $request,$id){
        $User = User::find($id);

        $User->update($request->all());
        $this->validate($request,[
            'name'=>'required',

        ]);
        $User->name=$request->name;
        return redirect('/AdminPanel');
    }

}
