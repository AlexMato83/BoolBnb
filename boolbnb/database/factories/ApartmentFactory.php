<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;


$factory->define(Apartment::class, function (Faker $faker) {

    return [
      'name'=>$faker -> sentence(3),
      'mq'=> rand(35,150),
      'latitude'=>$faker ->latitude(),
      'longitude'=>$faker ->longitude(),
      'rooms'=>rand(1,6),
      'bathrooms'=>rand(1,6),
      'images'=> "'[" . $faker-> imageUrl() . "," . $faker-> imageUrl() . "," . $faker-> imageUrl() . "]'",
      'views'=>rand(0,20),
    ];
});
