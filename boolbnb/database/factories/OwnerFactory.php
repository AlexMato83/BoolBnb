<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
      'name'=>$faker -> firstName(),
      'lastname'=>$faker -> lastName(),
      'dateOfBirth'=>$faker -> date(),
      'email'=>$faker -> safeEmail(),
      'email_verified_at'=>$faker -> date(),
      'password'=>$faker -> password(),
      'creditCard'=>$faker -> creditCardNumber()
    ];
});
