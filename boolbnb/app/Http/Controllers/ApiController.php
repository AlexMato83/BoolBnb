<?php

// ===========================================================
//                    * API CONTROLLER *
// ===========================================================


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorshipstype;
use Auth;

class ApiController extends Controller
{
    public function welcome_show(){
        $apartments = Apartment::all();

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

        // $user = Auth::user();
        // $id_owner = $apartment -> user_id;
        // if ($user-> id == $id_owner) {

        // }else {
        //     return view("error");
        // }

        return view("payment", compact("apartment", 'sponsorshipstype', 'nonce', 'title', 'start_date'));




    }
}
