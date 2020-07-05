<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
class ApiController extends Controller
{
    public function welcome_show(){
        $apartments = Apartment::all();
        return view("prova_api" , compact("apartments"));
    }
}
