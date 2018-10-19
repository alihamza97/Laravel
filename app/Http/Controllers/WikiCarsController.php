<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\WikiCars;
use Auth;
use Image;
use File;
use Illuminate\Support\Facades\Gate;
class WikiCarsController extends Controller
{
  //  functions
    //there are two guards one is for admin and the other one is for users.
    //this  function give access to both  user and admin to admin panel
    //2 different guards have been configured in config/auth.php
    ///in middleware/RedirectifAuthenticated there is a function to hadle these guards
    public function __construct()
    {
        $this->middleware('auth:web,admin');
//        $this->middleware('guest:admin');

    }
//this function is for adding(creating)objects to the database
    public function add(Request $request){
        $wiki_cars=new WikiCars;
          $this->validate($request,[
            'carTitle'=>'required',
              'description'=>'required',
              'year'=>'required',

        ]);
       $wiki_cars->carTitle=$request->carTitle;
        $wiki_cars->description=$request->description;
        $wiki_cars->year=$request->year;
        $wiki_cars->userId = Auth::user()->id;

        if($request->hasFile('carImage')){
            $carImage=$request->file('carImage');
            $filename=time() . '.' . $carImage->getClientOriginalExtension();

            Image::make($carImage)->resize(250, 250)->insert(public_path('images/watermark.png'), 'bottom-right')->save( public_path('images/cars/' . $filename ) );


            $wiki_cars->carImage=$filename;
        }
        $wiki_cars->save();
        return redirect('/subscriber');
    }

//this function is for updating the object description
    public function updated(Request $request,$id){
         $wiki_cars=WikiCars::find($id);
       $wiki_cars->update($request->all());
//        $wiki_cars=new WikiCars();
        $this->validate($request,[
            'carTitle'=>'required',
            'description'=>'required',
            'year'=>'required',
        ]);

        $wiki_cars->carTitle=$request->carTitle;
        $wiki_cars->description=$request->description;
        $wiki_cars->year=$request->year;
        $wiki_cars->userId = Auth::user()->id;
        $wiki_cars->save();

        return redirect('/subscriber');
    }


    //this function will delete the object according to the object id
    public function delete($id)
    {
        $wiki_cars = WikiCars::find($id);

        $wiki_cars->delete();
//        DB::table('wiki_cars')->where('id',$id)->delete();

        return redirect('/subscriber');
    }

//this function redirect to pages.edit
    public  function edit(){
        return view('pages.edit');
    }
    //this funtion will get the car to update from database and redirect to the update section gate is used in this
    //function to make sure that only a user who has created the object can update it.Admin cannot update it due to limited
    //authorization because of gate.But admin can delete it if it is contains scam etc.
    public function update($id){
        $wiki_cars = WikiCars::find($id);
        if(Gate::allows('edit_post',$wiki_cars))
       return view('pages.update',compact('wiki_cars'));
        else
            return redirect('/subscriber')->with('message','you are not allowed to perform this action');
//        return redirect('/subscriber');

    }
    //this function will get all cars and redirect to the information.blade.php
    public function index()
    {

        $WikiCars= WikiCars::all();
        return view('Information',compact('WikiCars'));

    }
    //this function will get all cars from database and redirect to pages.subscriber
    public function subs()
    {
        $WikiCars= WikiCars::all();
        return view('pages.subscriber',compact('WikiCars'));
    }

//this function will find the car according to the car id
    public function carDetails($id)
    {

        $WikiCar= WikiCars::find($id);

       return view('pages.Details',compact('WikiCar'));
//        return View::make('pages.Details', ['properties' => $WikiCar, 'files' => $files]);


    }

}
