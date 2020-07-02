<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';

    public function apartments(){

      return $this->hasMany(Apartment::class);
    }
}
