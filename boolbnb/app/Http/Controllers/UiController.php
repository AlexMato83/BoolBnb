<?php

// ===========================================================
//                    * UI  CONTROLLER *
// ===========================================================


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Apartment;
use App\Message;
use App\View;
use DateTime;
use App\Sponsorship;

class UiController extends Controller
{
    public function index()
    {
      $apartments = new Apartment();
      $app = $apartments->getRandom6();

        return view("welcome")->with('app' , $app);
    }

    public function show_ui_apartments(Request $request){
       $services = Service::all();
      $latitude = $request['latitude'];
      $longitude = $request['longitude'];
      $add = $request['address'];
      return view('ui_apartments',compact('latitude','longitude','add','services'));
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
    public function create_view($id){
        $apt = Apartment::findOrFail($id);
        $views = $apt -> views;
        function get_ip(){
            if (!empty($_SERVER['HTTP_CLIENT_IP']))
            {
                $ip_address = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
                $ip_address = $_SERVER['REMOTE_ADDR'];
            }
            return $ip_address;
        }
        $ip_address = get_ip();
        $condizione = true;
        foreach ($views as $view) {
            $date = $view['created_at'];
            $edit_date = new DateTime($date);
            $new_date = $edit_date->format('y-m-d');
            $today_date = date("y-m-d");
            // dd($today_date);
            if ($ip_address == $view['ip_user'] && ($new_date == $today_date)) {
                $condizione = false;
            }
        }

        if ($condizione == true) {
            $view = new View;
            $view['ip_user'] = $ip_address;
            $view['apartment_id'] = $id;
            $view->save();
        }
      return redirect()->route('ui_apartment',$id);
    }

    public function filter_ui_apartments(Request $request){
      $apartments_all = Apartment::all();
      $apartments = [];
      $sponsorships = Sponsorship::all();
      foreach ($apartments_all as $apartment) {
        if ($apartment["visibility"] == 1) {
          $apartments[] = $apartment;
        }
      }
      $services = Service::all();

      $r_services = [];
      $validate = $request -> validate([

          "address" => "required",
          "rooms" => "",
          "search_radius" => "required",
          "beds" => "",
          "services[]" => "array"

          ]);

        $search_radius = ($validate["search_radius"] * 1000);
        $center_lat = $request["latitude"];
        $center_long = $request["longitude"];
        $rooms = $request['rooms'];
        $beds = $request['beds'];
        if (isset($request['services'])) {
          foreach ($services as $service) {
            if (in_array($service['id'], $request['services'])) {
              $r_services [] = $service;
            }
          }
        }
        function filter_by_sponsorship($sponsorships){
            $sponsor_filtered_apt = [];
            foreach ($sponsorships as $sponsorship) {
                $date=date_create($sponsorship['startDate']);
                $duration = $sponsorship -> sponsorshipstype -> duration;
                date_add($date,date_interval_create_from_date_string($duration . ' days'));
                // date_add($date,date_interval_create_from_date_string("3 days"));
                $end_date = date_format($date,"Y-m-d");
                if (($sponsorship['startDate'] <= date('Y-m-d')) && ($end_date > date('Y-m-d'))) {
                    $sponsor_filtered_apt [] = $sponsorship -> apartment;
                }
            }
            return $sponsor_filtered_apt;
        }
        function filters($rooms, $beds, $r_services, $In_radius_apartments)
        {
            if (isset($rooms)) {
                foreach ($In_radius_apartments as $key => $apartment) {
                  if ($apartment['rooms'] < $rooms) {
                      array_splice($In_radius_apartments, $key, 1);
                      $key = $key - 1;
                  }

                }
            }
            if (isset($beds)) {
                foreach ($In_radius_apartments as $key => $apartment) {
                  if ($apartment['beds'] < $beds) {
                      array_splice($In_radius_apartments, $key, 1);
                      $key = $key - 1;
                  }

                }
            }
            if (isset($r_services)) {
              foreach ($In_radius_apartments as $key => $apartment) {
                foreach ($r_services as $r_service){
                  $possible_apt = false;
                  foreach ($apartment-> services as $service) {
                    if ($r_service["id"] == $service["id"]){
                      $possible_apt = true;
                      break;
                    }
                  }
                  if (!$possible_apt) {
                    array_splice($In_radius_apartments, $key, 1);
                    $key = $key - 1;
                  }
                  break;
                }
              }
            }
          return $In_radius_apartments;
        }

        function ordered_by_dist($apartments_list){
          $array_dist =[];
          $array_complete = [];

          foreach ($apartments_list as $apartment) {
            $array_dist[] = $apartment["dist"];
          }
          asort($array_dist);
          foreach ($array_dist as $dist) {
            foreach ($apartments_list as $key => $apartment) {
              if ($dist == $apartment["dist"]) {
                $array_complete[]= $apartment;
                unset($apartments_list[$key]);
              }
            }
          }
          return $array_complete;
        }

        //*************************LA FUNZIONE CHE SEGUE INVECE E' FOLLIA PURA MA VA BENE COSI
        //CALCOLO DISTANZA TRA DUE PUNTI
        // la lunghezza dell' equatore è pari a 2*M_PI*R.
        // Il raggio del parallelo di latitudine L è pari a R*cos(L)
        // la lunghezza del parallelo di latitudine L è 2*M_PI*6378137*cos(L).
        // 1 grado latitudine = 1109467 metri
        // 6378137 metri = raggio terrestre.
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

        $filter_by_sponsorship = filter_by_sponsorship($sponsorships);
        $apartments_in_radius=In_radius($apartments,$center_lat, $center_long,$search_radius);
        $apartments_filtered = filters($rooms, $beds, $r_services, $apartments_in_radius);
        $apartments_found['sponsored'] = filters($rooms, $beds, $r_services, $filter_by_sponsorship);
        $apartments_found['normal'] = ordered_by_dist($apartments_filtered);

        foreach ($apartments_found['sponsored'] as $sponsored) {
            foreach ($apartments_found['normal'] as $key => $normal) {
                if ($sponsored['id'] == $normal['id']) {
                    unset($apartments_found['normal'][$key]);
                }
            }
        }

        $add = $request['address'];

    return view("ui_apartments", compact("apartments_found",'apartments','services','add'));

    // AGGIUNGERE FILTRI : N° stanze, N° posti letto, servizi
    }




}
