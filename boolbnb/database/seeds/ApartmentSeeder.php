<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Category;
use App\Owner;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 40)-> make()
                                    -> each(function ($apartment){
            $owner = Owner::inRandomOrder() -> first();
            $apartment->owner() -> associate($owner);
            $category = Category::inRandomOrder() -> first();
            $apartment -> category() -> associate($category);
            $apartment -> save();
        });
    }
}
