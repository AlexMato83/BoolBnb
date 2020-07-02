<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorshipstype extends Model
{
    protected $table = 'sponsorshipstype';

    public function sponsorships() {

      return $this->hasMany(Sponsorship::class);
    }
}
