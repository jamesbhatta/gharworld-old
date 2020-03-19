<?php

namespace App\Http\Controllers\Frontend;

use App\Property;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
	public function show(Property $property)
	{
		$property->load('images', 'city');
		// $cities = City::orderBy('name')->get();
		$relatedProperties = Property::with(['images', 'city'])->where('city_id', $property->city_id)->Where('property_for', $property->property_for)->whereNotIn('id', [$property->id])->get()->take('6');

		if (count($relatedProperties) == 0) {
			$relatedProperties = Property::with(['images', 'city'])->where('property_for', $property->property_for)->whereNotIn('id', [$property->id])->get()->take('6');
		}

		return view('frontend.property.show', compact([
			'property',
			// 'cities',
			'relatedProperties',
		]));
	}

	public function search(Request $request)
	{
		$city_id = $request->city_id;
		$property_for = $request->property_for;
		$max_price = $request->max_price;

		$properties = new Property;
		if ($city_id != null) {
			$properties = $properties->where('city_id', $city_id);
		}
		if ($property_for) {
			$properties = $properties->where('property_for', $property_for);
		}
		if ($max_price) {
			$properties = $properties->where('price', '<=', $max_price);
		}
		$properties = $properties->published()->with('city')->latest()->paginate(config('constants.property.posts_per_page'));

		$cities = City::orderBy('name')->get();

		return view('frontend.property.results', compact([
			'properties',
			'cities'
		]));
	}
}
