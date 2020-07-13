<?php

// ===========================================================
//                    * API CONTROLLER *
// ===========================================================


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorshipstype;
use Auth;
use App\Sponsorship;

class ApiController extends Controller
{
    public function welcome_show(){
        $apartments = [];
        $sponsorships = Sponsorship::all();
        $id_apart_spons = [];
        foreach ($sponsorships as $key => $sponsorship) {
          $key = $sponsorship["apartment_id"];
          $id_apart_spons[$key] = "true";
        }
        foreach ($id_apart_spons as $key => $value) {
          $apartments[] = Apartment::findOrFail($key);
        }

        return view("prova_api" , compact("apartments"));
    }
    public function token_generate()
    {
        return view("token_generate");
    }
    public function payment()
    {
        $apartment_id = $_POST["apartment_id"];
        $price = $_POST["price"];
        $nonce = $_POST["nonce"];
        $title = $_POST["title"];
        $start_date = $_POST["start_date"];
        $apartment = Apartment::findOrFail($apartment_id);
        $sponsorshipstypes = Sponsorshipstype::all();
        foreach ($sponsorshipstypes as $type) {
            if ($type['price'] == $price) {
                $id_sponsorshiptype = $type['id'];
            }
        }
        $sponsorshipstype = Sponsorshipstype::findOrFail($id_sponsorshiptype);

        $user = Auth::user();
        $id_owner = $apartment -> user_id;
        if ($user-> id == $id_owner) {
          return view("payment", compact("apartment", 'sponsorshipstype', 'nonce', 'title', 'start_date'));

        }else {
            return view("error");
        }

    }
}
