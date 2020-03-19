<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
        	['name' => 'Dhangadhi'],
        	['name' => 'Mahendranagar'],
        	['name' => 'Pokhara'],
        	['name' => 'Kathmandu'],
        	['name' => 'Butwal'],
        	['name' => 'Nepaljung'],
        	['name' => 'Hetauda'],
        	['name' => 'Lalitpur'],
        	['name' => 'Bhaktapur'],
        	['name' => 'Biratnagar'],
        	['name' => 'Chitwan'],
    	]);
    }
}
