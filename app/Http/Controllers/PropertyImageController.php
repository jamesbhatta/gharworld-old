<?php

namespace App\Http\Controllers;

use App\Property;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class PropertyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        return view('property.images',[
            'property' => $property,
        ]);
    }

    /***
     * Display form for creating Images
     *
    */
    public function create(Property $property)
    {
        return view('property.images', compact(['property']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Property $property,Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {
            $path = Storage::disk('public')->put(config('constants.property.property_image_dir'), $request->file('file'));
            $propertyImage = new PropertyImage();
            $propertyImage->path = $path;
            $propertyImage->property_id = $property->id;
            $propertyImage->user_id = auth()->user()->id;
            $propertyImage->save();

            if ( !$property->published ) {
                $property->published = true;
                $property->update();
            }
        }

        $response = array('success' => "Image Saved");
        return response()->json($response);
    }

    /**
     * Responses a listing of images.
     *  @param Property $property
     * @return \Illuminate\Http\Response
     */
    public function list($property_id)
    {
        $images = PropertyImage::where('property_id', $property_id)->latest('id')->get();
        $images = $images->map(function($image){
            $image->path = asset('storage/'.$image->path);
            return $image;
        });
        return response()->json($images);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyImage $propertyImage)
    {
        try {
            if (Storage::disk('public')->exists($propertyImage->path)) {
                Storage::disk('public')->delete($propertyImage->path);
            }
            $propertyImage->delete();

            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(null, 500);
        }
    }
}
