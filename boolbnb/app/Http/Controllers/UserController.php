<?php

// ===========================================================
//                    * USER CONTROLLER *
// ===========================================================

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

    // funzione per creare un appartamento
    public function create(){

        $services = Service::all();
        $categories = Category::all();

      return view("create_apartment", compact('services', "categories"));
    }

    // funzione per salvare l'appartamento creato
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
      $folder = '/uploads/images/';
      $ext = $image->getClientOriginalExtension();
      $filePath = $folder . $name. '.' . $ext;
      $image->storeAs($folder, $name.'.'. $ext, 'public');
      $apartment->images = $filePath;
      $apartment -> save();

      // *******************************
      $apartment -> services() -> sync($validate['services']);

      return redirect() -> route("home");
    }

    // funzione per mostrare gli appartamenti
    public function show_apartments()
    {

        $user = Auth::user();
        $apartments = $user -> apartments;

        return view("user_apartments" ,compact("apartments", 'user'));
    }

    // funzione per modificare un appartamento
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

    // funzione per validare le modifiche ad un appartamento
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

    // funzione per mostrare l'appartemento selezionato
    public function show_upra_apartment($id){
      $user = Auth::user();
      $apartment = Apartment::findOrFail($id);

      if ($apartment -> user_id === $user -> id) {
        return view("show_upra_apartment", compact('apartment'));
      } else {
          return view("error");
      }
    }

    // funzione per cancellare appartamento
    public function delete_apartment($id){

      $apartment = Apartment::findOrFail($id);
      $apartment ->delete();
      return redirect()-> route('user_apartments');
    }

    // funzione per mostrare i messaggi
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

    // funzione per le statistiche dell'appartamento selezionato
    public function show_statistics($id){

      $user = Auth::user();
      $apartment = Apartment::findOrFail($id);
      // foreach ($apartment -> message as $message) {
      //
      // }
      $messages = $apartment -> messages;
      $total_messages = count($messages); //num mex totali
      $views = $apartment -> views;
      $total_views = count($views);       //num views totali

      $all_mex_month = [];
      foreach ($messages as $message) {
        $date_mex = $message['created_at'];
        $mex_months = date("F", strtotime($date_mex));
        $all_mex_month[] = $mex_months;
      }


      $all_views_month = [];
      foreach ($views as $view) {
        $date = $view['created_at'];
        $months = date("F", strtotime($date));
        $all_views_month[] = $months;
      }
      function create_chart($data_for_month){

        $list_of_months = [
            'January'=> 0,
            'February'=> 0,
            'March'=> 0,
            'April'=> 0,
            'May'=> 0,
            'June'=> 0,
            'July'=> 0,
            'August'=> 0,
            'September'=> 0,
            'October'=> 0,
            'November'=> 0,
            'December'=> 0
        ];
        // suddivisione views per mese(chiave)
        foreach ($list_of_months as $each_month=> $data){

            foreach ($data_for_month as $month){

                if($each_month == $month){

                  $data ++;
                    $list_of_months[$month] = $data;
                }
            }
        }
        return $list_of_months;
      }
      $list_of_views = create_chart($all_views_month);
      $list_of_messages = create_chart($all_mex_month);

      if ($apartment -> user_id === $user -> id) {
        return view('statistics',compact('list_of_views','list_of_messages','total_views','total_messages'));
      } else {
          return view("error");
      }


    }
}
