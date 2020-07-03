<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Str;
use Auth;
use App\Service;
use App\User;
class UserController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }


    public function create(){

        $services = Service::all();

      return view("create_apartment", compact('services'));
    }

    public function store(Request $request){

      $user_id =Auth::user() ->id;

      $validate = $request -> validate([

          "name" => "required",
          "mq" => "required",
          "address" => "required",
          "rooms" => "required",
          "bathrooms" => "required",
          "images" => "required|image",
          "services" => "required"
          ]);
        //   dd($request);
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
      $apartment -> services() -> sync($validate['services']);

      return redirect() -> route("home");
    }

    public function show_apartments()
    {

        // $user_id =Auth::user() ->id;
        $user = Auth::user();
        // $user = User::findOrFail($user_id);
        $apartments = Apartment::all();
        $user_apartments = [];
        foreach ($apartments as $apartment) {
            foreach ($user -> apartments() as $us_apartment) {

                dd($user -> apartments());
                if ($us_apartment -> id === $apartment['id']) {
                    $user_apartments[] = $apartment;
                }
            }


        }
        // dd($us_apartments);
    }

    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $services = Services::all();

        return view('edit_apartment', compact('apartment', 'services'));
    }

}
