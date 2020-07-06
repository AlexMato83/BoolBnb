<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Category;
use App\Apartment;
use App\Message;

class UiController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $categories = Category::all();

        return view("welcome", compact('services', 'categories'));
    }
    public function show_ui_apartments(Request $request)
    {
        $apartments = Apartment::all();

        $apartments_found = [];
        foreach ($apartments as $apartment) {
          if ($apartment['address'] === $request['address']) {
            $apartments_found[] = $apartment;
          }
        }

        return view("ui_apartments", compact('apartments','apartments_found'));
    }

    public function show_ui_apartment($id){

      $apartment = Apartment::findOrFail($id);

      return view('ui_apartment',compact('apartment'));
    }
    public function send_message_upra(Request $request, $id)
    {
        // dd($request);
        $message = new Message;
        $message['apartment_id'] = $id;
        $message['email'] = $request['email'];
        $message['text'] = $request['text'];
        $message -> save();

        return redirect()->route('ui_apartment', $id);
    }

}
