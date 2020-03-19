<?php
namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Property;
use App\City;
use App\Facility;
use App\About;
use App\Contact;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	
	public function index()
	{
		$usersCount = User::count();
		$propertiesCount = Property::count();
		$citiesCount = City::count();
		$facilitiesCount = Facility::count();
		
		$propertiesData = DB::table('properties')->where('created_at', '>', date(Carbon::now()->subDays(10)))->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->get();
		$usersData = DB::table('users')->where('created_at', '>', date(Carbon::now()->subDays(7)))->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->get();
		
		return view('admin.dashboard',compact([
			'usersCount',
			'propertiesCount',
			'citiesCount',
			'facilitiesCount',
			'propertiesData',
			'usersData',
			])
		);
	}
	
	public function profile()
	{
		$user = auth()->user();
		return view('admin.profile', compact('user'));
	}
	
	public function users($keyword = null, $user_id = null)
	{
		$keyword = request('keyword');
		$userId = request('user_id');
		
		$totalUsers = User::count();
		$newUsers = User::where('created_at', '>', date(Carbon::now()->subDays(30)))->count();
		
		$users = User::latest();
		if ($keyword) {
			$users = $users->where('email', $keyword)->orWhere('name', 'like', '%' . $keyword . '%');
		}
		if ($userId) {
			$users = $users->where('id', $userId);
		}
		
		$users = $users->paginate(10);
		
		return view('admin.users', compact([
			'totalUsers',
			'newUsers',
			'users'
			])
		);
	}
	
	public function properties()
	{
		return view('admin.properties');
	}
	
	public function listProperties()
	{
		$properties = Property::leftJoin('cities', 'cities.id', '=', 'properties.city_id')->select(['properties.id', 'title', 'slug', 'property_for', 'cities.name as city_name', 'user_id']);
		return datatables()->of($properties)->make(true);
	}
	
	public function editUser($id)
	{
		$user = User::findOrFail($id);
		return view('admin.profile', compact('user'));
	}
	
	public function about()
	{
		$about = About::all()->last();
		if (empty($about)) {
			$about = new About();
		}
		return view('admin.pages.about', compact('about'));
	}
	
	public function updateAbout(Request $request)
	{
		$about = About::all()->last();
		if (empty($about)) {
			$about = new About();
		}
		$about->content = $request->input('content');
		$about->save();

		return redirect()->back()->with(['success' => 'About Page updated.']);
	}

	public function contact()
	{
		$contact = Contact::all()->last();
		if (empty($contact)) {
			$contact = new Contact();
		}
		return view('admin.pages.contact', compact('contact'));
	}

	public function updateContact(Request $request)
	{
		$contact = Contact::all()->last();
		if (empty($contact)) {
			$contact = new Contact();
		}
		$contact->address = $request->input('address');
		$contact->phone = $request->input('phone');
		$contact->phone_sec = $request->input('phone_sec');
		$contact->email = $request->input('email');
		$contact->save();

		return redirect()->back()->with(['success' => 'Contact Page updated.']);
	}
}
