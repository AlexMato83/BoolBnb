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
use App\Category;
use App\Service;
class ApiController extends Controller
{
    public function welcome_show(){
        $apartments = [];
        $sponsorships = Sponsorship::all();
        foreach ($sponsorships as $sponsorship) {
            $date=date_create($sponsorship['startDate']);
            $duration = $sponsorship -> sponsorshipstype -> duration;
            date_add($date,date_interval_create_from_date_string($duration . ' days'));
            // date_add($date,date_interval_create_from_date_string("3 days"));
            $end_date = date_format($date,"Y-m-d");
            if (($sponsorship['startDate'] < date('Y-m-d')) && ($end_date > date('Y-m-d'))) {
                $apartments [] = $sponsorship -> apartment;
            }

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

        // $user = Auth::user();
        // $id_owner = $apartment -> user_id;
        // if ($user-> id == $id_owner) {

        // }else {
        //     return view("error");
        // }

        return view("payment", compact("apartment", 'sponsorshipstype', 'nonce', 'title', 'start_date'));




    }

    public function first_search()
    {
        $longitude = $_GET['longitude'];
        $latitude = $_GET['latitude'];
        $add = $_GET['add'];
        $apartments_all = Apartment::all();
        $apartments = [];
        $sponsorships = Sponsorship::all();
      //
        foreach ($sponsorships as $sponsorship) {
            $date=date_create($sponsorship['startDate']);
            $duration = $sponsorship -> sponsorshipstype -> duration;
            date_add($date,date_interval_create_from_date_string($duration . ' days'));
            // date_add($date,date_interval_create_from_date_string("3 days"));
            $end_date = date_format($date,"Y-m-d");
            if (($sponsorship['startDate'] <= date('Y-m-d')) && ($end_date > date('Y-m-d'))) {
                $sponsor_apt [] = $sponsorship -> apartment;
            }
        }
        $apartments_found['sponsored'] = $sponsor_apt;
        foreach ($apartments_all as $apartment) {
          if ($apartment["visibility"] == 1) {
            $apartments[] = $apartment;
          }
        }
        $services = Service::all();
        $categories = Category::all();
        $center_lat = $longitude;
        $center_long = $latitude;
        $search_radius = 20;
      //
        function In_radius($apartments,$latitude, $longitude,$search_radius){ // inserire coordinate del punto centro di ricerca. il search radius sarà in metri
          $equator_radius = 6378137;
          $mt_for_long_deg = (2*M_PI*$equator_radius* cos((abs($latitude)*M_PI)/180)/360);
          $mt_for_lat_deg = 110946;
          $results = [];
          $center_of_search = [                                    // sarà l'appartamento o l'indirizzo digitato
            "lat" => ($latitude),
            "long" => ($longitude)
          ];
          foreach ($apartments as $apartment) {
            $dist_lat = abs($center_of_search["lat"] - $apartment["latitude"])* $mt_for_lat_deg;

            $dist_long = abs($center_of_search["long"] - $apartment["longitude"])* $mt_for_long_deg;
            $dist = sqrt(($dist_lat*$dist_lat) + ($dist_long*$dist_long));
            // dd($dist_lat,$dist_long,$dist);
            if ($dist <= $search_radius) {
              $apartment["dist"] = $dist/1000;
              $results[] = $apartment;
            }
          }
          // dd($results,$center_of_search["lat"],$center_of_search["long"]);
          return $results;
        }


        $apartments_found['normal'] = In_radius($apartments,$center_lat, $center_long,$search_radius);
        // foreach ($apartments_found['sponsored'] as $sponsored) {
        //     foreach ($apartments_found['normal'] as $key => $normal) {
        //         if ($sponsored['id'] == $normal['id']) {
        //             unset($apartments_found['normal'][$key]);
        //         }
        //     }
        // }

      // $results = [
      //    'apartments_found' => $apartments_found,
      //    'services' => $services,
      //    'categories' => $categories,
      //    "add" => $add
      // ]

      $cane = $apartments_found['normal'];

      return view("apt_api", compact('cane'));
    }

}
