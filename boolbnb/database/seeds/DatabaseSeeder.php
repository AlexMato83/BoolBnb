<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OwnerSeeder::class,
            CategorySeeder::class,
            SponsorshipstypeSeeder::class,
            ApartmentSeeder::class,
            SponsorshipstypeSeeder::class,
            ServiceSeeder::class,
            MessageSeeder::class
        ]);
    }
}
