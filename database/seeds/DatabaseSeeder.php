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
        $this->call(UsersTableSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(FacilitySeeder::class);

        factory(App\Property::class, 5)->create();
        factory(App\PropertyImage::class, 10)->create();
        // factory(App\User::class, 20)->create();

    }
}
