<?php

if (!function_exists("saveImage")) {
	function saveImage($file, $folder){
		$imagePath = Storage::disk('public_uploads')->put($folder, $file);
		return $imagePath;
	}
}

if (! function_exists('hasError')) {
	/**
	 * Check for the existence of an error message and return a class name
	 *
	 * @param  string  $key
	 * @return string
	 */
	function hasError($key)
	{
		$errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
		return $errors->has($key) ? 'is-invalid' : '';
	}
}

if (! function_exists('errorClass')) {
	/**
	 * Check for the existence of an error message and return a class name
	 *
	 * @param  string  $key
	 * @return string
	 */
	function errorClass($key)
	{
		$errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
		return $errors->has($key) ? 'is-invalid' : '';
	}
}

if (! function_exists('setActive')) {
	/**
	 * Check if the route is active or not
	 *
	 * @param  string  $key
	 * @return string
	 */
	function setActive($path, $active = 'active') {
		// return Request::routeIs($path) ? $active : '';
		return call_user_func_array('Request::is', (array)$path) ? $active : '';
	}
}

if (! function_exists('feedback')) {
	function feedback($key) {
		$key = str_replace(['\'', '"'], '', $key);
		$errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
		if ($message = $errors->first($key)) {
			return '<div class="invalid-feedback">'.$message.'</div>';
		}
	}
}
?>