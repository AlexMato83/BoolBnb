<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Str;
use Auth;
class UserController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }


    public function create(){

      return view("create_apartment");
    }

    public function store(Request $request){

      $user_id =Auth::user() ->id;

      $validate = $request -> validate([

        "name" => "required",
        "mq" => "required",
        "address" => "required",
        "rooms" => "required",
        "bathrooms" => "required",
        "images" => "required"
      ]);

      $apartment = new Apartment;

      $apartment["name"] = $validate["name"];
      $apartment["mq"] = $validate["mq"];
      $apartment["address"] = $validate["address"];
      $apartment["rooms"] = $validate["rooms"];
      $apartment["bathrooms"] = $validate["bathrooms"];
      $apartment["images"] = $validate["images"];
      $apartment["views"] = 0;
      $apartment["user_id"] = $user_id;

      // *********************************
      
      $image = $request->file('images');
      $name = Str::slug($request->input('name')).'_'.time();
      $folder = '/uploads/images';
      $ext = $image->getClientOriginalExtension();
      $filePath = $folder . $name. '.' . $ext;
      $image->storeAs($folder, $name.'.'. $ext, 'public');
      $apartment->images = $filePath;
      $apartment -> save();

      // *******************************
      return redirect() -> route("home");
    }
}
