<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PropertyImage;
use Faker\Generator as Faker;

$factory->define(PropertyImage::class, function (Faker $faker) {
	$image = $faker->image('public/storage/property',400,300, null, false);
	$property_id = \App\Property::all()->random()->id;
	$property = \App\Property::select('user_id')->find($property_id);
	$userId = $property->user_id;

	return [
		'path' => config('constants.property.property_image_dir') . '/'  . $image ,
		'property_id' => $property_id,
		'user_id' => $userId,
	];
});
