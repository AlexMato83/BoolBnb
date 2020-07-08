<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\View;
use Str;
use Auth;
use App\Service;
use App\User;
use App\Category;
use App\Message;
class UserController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }


    public function create(){

        $services = Service::all();
        $categories = Category::all();

      return view("create_apartment", compact('services', "categories"));
    }

    public function store(Request $request){

      $user_id =Auth::user() ->id;
      $categories = Category::all();
      $validate = $request -> validate([

          "name" => "required",
          "mq" => "required",
          "address" => "required",
          "rooms" => "required",
          "bathrooms" => "required",
          "beds" => "required",
          "images" => "required|image",
          "services" => "required",
          "category_id" => "required",
          "visibility" => "required"
          ]);
        //   dd($request);
      $apartment = new Apartment;

      $apartment["name"] = $validate["name"];
      $apartment["mq"] = $validate["mq"];
      $apartment["latitude"] = $request["latitude"];
      $apartment["longitude"] = $request["longitude"];
      $apartment["rooms"] = $validate["rooms"];
      $apartment["address"] = $validate["address"];
      $apartment["bathrooms"] = $validate["bathrooms"];
      $apartment["beds"] = $validate["beds"];
      $apartment["images"] = $validate["images"];
      $apartment["visibility"] = $validate["visibility"];
      $apartment["user_id"] = $user_id;
      $apartment["category_id"] = $validate["category_id"];

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
      $apartment -> services() -> sync($validate['services']);

      return redirect() -> route("home");
    }

    public function show_apartments()
    {

        $user = Auth::user();
        $apartments = $user -> apartments;

        return view("user_apartments" ,compact("apartments", 'user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $apartment = Apartment::findOrFail($id);
        $services = Service::all();
        $categories = Category::all();
        if ($apartment -> user_id == $user-> id) {
            return view('edit_apartment', compact('apartment', 'services','categories'));
        }else {
            return view('error');
        }


    }

    public function update(Request $request, $id)
    {

       $user_id =Auth::user() ->id;
       $apartment = Apartment::findOrFail($id);

       $validate = $request -> validate([

            "name" => "required",
            "mq" => "required",
            "address" => "required",
            "rooms" => "required",
            "bathrooms" => "required",
            "beds" => "required",
            "images" => "image",
            "services" => "required",
            "category_id" => "required",
            "visibility" => "required"

            ]);

        $apartment["name"] = $validate["name"];
        $apartment["mq"] = $validate["mq"];
        $apartment["latitude"] = $request["latitude"];
        $apartment["longitude"] = $request["longitude"];
        $apartment["address"] = $validate["address"];
        $apartment["rooms"] = $validate["rooms"];
        $apartment["bathrooms"] = $validate["bathrooms"];
        $apartment["beds"] = $validate["beds"];
        $apartment["images"] = $request["images"];
        $apartment["user_id"] = $user_id;
        $apartment["visibility"] = $validate["visibility"];
        $apartment["category_id"] = $validate["category_id"];


        // *********************************
        if ($request["images"]) {
          // code...
          $image = $request->file('images');
          $name = Str::slug($request->input('name')).'_'.time();
          $folder = '/uploads/images';
          $ext = $image->getClientOriginalExtension();
          $filePath = $folder . $name. '.' . $ext;
          $image->storeAs($folder, $name.'.'. $ext, 'public');
          $apartment->images = $filePath;
        }
        $apartment -> save();

        // *******************************
        $apartment -> services() -> sync($validate['services']);

        return redirect() -> route('user_apartment');
    }

    public function prova_tomtom(){

      return view("my-map");
    }

    public function show_upra_apartment($id){
      $user = Auth::user();
      $apartment = Apartment::findOrFail($id);
      if ($apartment -> user_id === $user -> id) {

        return view("show_upra_apartment", compact('apartment'));
    }else{
        return view("error");
    }

    //   $views = View::all();
    }

    public function delete_apartment($id){

      $apartment = Apartment::findOrFail($id);
      $apartment ->delete();
      return redirect()-> route('user_apartment');
    }

    public function show_messages(){

      $user = Auth::user();
      $apartments = $user -> apartments;

      $user_messages = [];
      foreach ($apartments as $apartment) {
        $messages = $apartment-> messages;

        foreach ($messages as $message) {

            $user_messages[] = $message;

        }
      }
      $array_messages = collect($user_messages);

      $ordered_messages = $array_messages->sortByDesc('id');

      return view('upra_messages',compact('ordered_messages'));
    }



}
