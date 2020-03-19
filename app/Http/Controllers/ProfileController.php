<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function profile()
	{
		$user = auth()->user();
		return view('profile.index', compact('user'));
	}

	public function update(User $user, Request $request)
	{
		$request->validate([
			'name' => 'required',
			'password' =>'required_with:new_password',
			'new_password' => 'nullable|min:6|confirmed',
		]);
		$user->name = $request->input('name');
		$user->address = $request->input('address');
		$user->mobile = $request->input('mobile');
		$password = $request->input('password');
		if ($password && $request->get('new_password')) {
			if ( Hash::check($password, $user->password) || auth()->user()->role == 'admin' ) {
				$user->password = Hash::make($request->get('new_password'));
			}else{
				return redirect()->back()->with('error', 'The password you entered is incorrect.');
			}
		}
		$user->update();

		return redirect()->back()->with('success', 'true');
	}
}
