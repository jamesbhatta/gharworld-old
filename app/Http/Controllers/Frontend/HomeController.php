<?php

namespace App\Http\Controllers\Frontend;

use App\Property;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		// get the paginated list of published properties
		// $properties = Property::published()->paginate(config('consatants.property.posts_per_page'));
		$properties = Property::published()->with('city')->latest('id')->paginate(config('constants.property.posts_in_homepage'));
		$cities = City::orderBy('name')->get();

		return view('frontend.home', compact([
			'properties',
			'cities'
		]));
	}
}
