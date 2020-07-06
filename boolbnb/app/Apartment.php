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

    public function views(){

      return $this->hasMany(View::class);
    }
}

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
  use Searchable;

    public function searchableAs()
    {
      return 'posts_index';
    }
}
