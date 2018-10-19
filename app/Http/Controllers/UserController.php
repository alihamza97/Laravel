<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use\App\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //
    public  function find(){
       return view('pages.profile',array('user'=>Auth::user()));


    }
    //this function doesnt allow any person who is not authorized to edit the content
    public  function subscriber_only(){

        if (Gate::allows('subscriber_only', Auth::user())) {
            // The current user can update the post...
            return view('pages.edit');
        }
        else
            {
                return "You are not a registered user";
        }

    }

}
