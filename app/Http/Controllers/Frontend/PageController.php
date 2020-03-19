<?php

namespace App\Http\Controllers\Frontend;

use App\About;
use App\Contact;
use App\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactForm;
use App\Mail\PropertyEnquiry;
use Illuminate\Support\Facades\Mail;

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

    public function processContactForm(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $formData = $request;
		$contact = Contact::all()->last();
        $to = $contact->email;
        Mail::to($to)->send(new ContactForm($formData));

        return redirect()->back()->with('success', 'We have received you message and will get back to you as early as possible.');
    }

    public function processEnquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|required_without:phone|email',
            'phone' => 'nullable',
            'property_slug' => 'required|exists:properties,slug'
        ]);

        $property_slug = $request->input('property_slug');
        $property = Property::where('slug', $property_slug)->first();
        $formData = $request;
        $contact = Contact::all()->last();
        $to = $contact->email;
        Mail::to($to)->send(new PropertyEnquiry($formData, $property));

        return redirect()->back()->with('enquirySuccess', true);
    }
}
