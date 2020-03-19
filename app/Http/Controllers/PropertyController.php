<?php

namespace App\Http\Controllers;

use App\Property;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = null)
    {
        $filter = request('filter');
        $properties = Property::mine();
        if ($filter == 'published') {
            $properties = $properties->published();
        }
        if ($filter == 'unpublished') {
            $properties = $properties->unpublished();
        }
        $properties = $properties->latest()->with('city')->paginate(Config('constants.property.posts_per_page'));
        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = \App\City::orderBy('name', 'asc')->get();
        $facilities = \App\Facility::orderBy('name')->get()->pluck('name');
        return view('property.create', compact(['cities', 'facilities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $property = new Property();
        $property->title = $request->input('title');
        $property->slug = $property->createSlug($request->title);
        $property->city_id = $request->input('city_id');
        $property->address = $request->input('address');
        $property->property_for = $request->input('property_for');
        $property->price =  $request->input('price');
        $property->negotiable =  $request->input('negotiable') ? true : false;
        $property->bedroom =  $request->input('bedroom');
        $property->living_room =  $request->input('living_room');
        $property->kitchen =  $request->input('kitchen');
        $property->bathroom =  $request->input('bathroom');
        if ($request->input('facilities')) {
            $property->facilities =  implode(",", $request->input('facilities'));
        }
        $property->description =  $request->input('description');
        $property->user_id = auth()->user()->id;
        $property->save();

        return redirect()->route('propertyImage.create', $property->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return redirect()->route('property.view', $property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        if ( ($property->user_id != auth()->user()->id) && !auth()->user()->isAdmin() ) {
            return abort( response('Unauthorized', 401) );
        }

        $cities = \App\City::orderBy('name', 'asc')->get();
        $facilities = \App\Facility::orderBy('name')->get()->pluck('name');
        return view('property.edit', compact(['property', 'cities', 'facilities']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $property->title = $request->input('title');
        $property->city_id = $request->input('city_id');
        $property->address = $request->input('address');
        $property->property_for = $request->input('property_for');
        $property->price =  $request->input('price');
        $property->negotiable =  $request->input('negotiable') ? true : false;
        $property->bedroom =  $request->input('bedroom');
        $property->living_room =  $request->input('living_room');
        $property->kitchen =  $request->input('kitchen');
        $property->bathroom =  $request->input('bathroom');
        if ($request->input('facilities')) {
            $property->facilities =  implode(",", $request->input('facilities'));
        }
        $property->description =  $request->input('description');
        $property->save();

        return redirect()->back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->back();
    }

    public function publish(Property $property)
    {
        if ($property->user_id == auth()->user()->id) {
            $property->published = true;
            $property->save();
            return redirect()->back()->with(['success' => 'Published']);
        }
        return redirect()->back()->with(['error' => 'Action Not Allowed']);
    }

    public function unpublish(Property $property)
    {
        if ($property->user_id == auth()->user()->id) {
            $property->published = false;
            $property->save();
            return redirect()->back()->with(['success' => 'Unpublished']);
        }
        return redirect()->back()->with(['error' => 'Action Not Allowed']);
    }

}
