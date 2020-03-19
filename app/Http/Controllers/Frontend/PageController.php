<?php

namespace App\Http\Controllers\Frontend;

use App\About;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = About::all()->last();
        if (empty($about)) {
            abort(404);
        }
        return view('frontend.about', compact('about'));
    }

    public function contact()
    {
        $contact = Contact::all()->last();
        if (empty($contact)) {
            abort(404);
        }
        return view('frontend.contact', compact('contact'));
    }
}
