<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
	public function index()
	{
		$facilities = Facility::orderBy('name')->get();

		return view('admin.facility.index', compact('facilities'));
	}

	public function store(Request $request)
	{
		$facility = new Facility();
		$facility->name = $request->input('name');
		$facility->save();

		return redirect()->back()->with('success', $request->input('name') . ' added to facility list.');
	}

	public function update(Request $request, Facility $facility)
	{
		$facility->name = $request->input('name');
		$facility->save();

		return redirect()->back()->with('success', $request->input('name') . ' has been updated.');
	}

}
