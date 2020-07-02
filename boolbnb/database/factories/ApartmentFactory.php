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
      'images'=>function(){
        $n = rand(5,10);
        $imgArray = [];
        for ($i=0; $i < $n; $i++) {
           $imgUrl = $faker -> imageUrl(640,480);
           $imgArray[] = $imgUrl;
        }
        return $imgArray;
      }
      'views'=>rand(0,20)
    ];
});
