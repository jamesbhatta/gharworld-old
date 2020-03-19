<?php

use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
        	['name' => 'Bike Parking'],
        	['name' => 'Car Parking'],
        	['name' => 'Hot and Cold Water'],
        	['name' => 'Free Wifi'],
        	['name' => 'Water Boring'],
        	['name' => 'Drinking Water'],
    	]);
    }
}
