<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Category;
use App\Apartment;
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
        dd($request);


        return view("ui_apartments", compact('apartments'));
    }
}
