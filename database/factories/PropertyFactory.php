<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
	$title = $faker->catchPhrase;
	$for = array('Rent', 'Sale');

	return [
		'title' => $title,
		'slug' => str_slug($title),
		'city_id' => \App\City::all()->random()->id,
		'address' => $faker->streetAddress,
		'property_for' => $for[array_rand($for)],
		'price' => random_int(1000, 200000),
		'negotiable' => true,
		'bedroom' => random_int(1, 10),
		'living_room' => random_int(1, 8),
		'kitchen' => random_int(1, 5),
		'bathroom' => random_int(1, 3),
		'facilities' => 'Wifi, Water, Electricity, Car Parking, Bike Parking, drainage, security, lift',
		'description' => $faker->paragraph(3, true),
		'published' => 1,
		'user_id' => \App\User::all()->random()->id,
	];
});
