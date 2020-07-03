<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    public function user(){

      return $this->belongsTo(User::class);
    }

    public function category(){

      return $this->belongsTo(Category::class);
    }

    public function services(){

      return $this->belongsToMany(Service::class);
    }

    public function messages(){

      return $this->hasMany(Message::class);
    }

    public function sponsorships(){

      return $this->hasMany(Sponsorship::class);
    }



}
