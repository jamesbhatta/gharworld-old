<?php
Route::get('/', 'Frontend\HomeController@index')->name('home');
// Route::get('/property/{property}', 'Frontend\PropertyController@show')->name('property.view');

Auth::routes();

Route::get('/property/{property}', 'Frontend\PropertyController@show')->name('property.view');

Route::get('/search', 'Frontend\PropertyController@search')->name('property.search');

Route::get('/about', 'Frontend\PageController@about')->name('about');
Route::get('/contact', 'Frontend\PageController@contact')->name('contact');
Route::post('/contact', 'Frontend\PageController@processContactForm')->name('contact.process');

Route::post('/enquiry', 'Frontend\PageController@processEnquiry')->name('enquiry.process');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::resource('/property', 'PropertyController');
	Route::put('/property/{property}/publish', 'PropertyController@publish')->name('property.publish');
	Route::put('/property/{property}/unpublish', 'PropertyController@unpublish')->name('property.unpublish');
	Route::get('/property/{property}/images', 'PropertyImageController@index')->name('property.images');
	Route::get('/property/image/create/{property}', 'PropertyImageController@create')->name('propertyImage.create');
	Route::post('/property/{property}/images', 'PropertyImageController@store')->name('propertyImages.store');
	
	Route::get('/profile', 'ProfileController@profile')->name('profile');
	Route::post('/profile/{user}', 'ProfileController@update')->name('profile.update');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
	Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
	Route::get('/profile', 'Admin\AdminController@profile')->name('admin.profile');
	Route::get('/users', 'Admin\AdminController@users')->name('admin.users');
	Route::get('/users/{id}/edit', 'Admin\AdminController@editUser')->name('admin.users.edit');
	Route::get('/properties', 'Admin\AdminController@properties')->name('admin.properties');
	Route::get('/ajax/properties/list', 'Admin\AdminController@listProperties')->name('ajax.properties.list');
	Route::get('/cities', 'CityController@index')->name('admin.cities');
	Route::post('/cities', 'CityController@store')->name('admin.cities.store');
	Route::put('/cities/{city}', 'CityController@update')->name('admin.cities.update');
	
	Route::get('/facilities', 'FacilityController@index')->name('admin.facilities');
	Route::post('/facilities', 'FacilityController@store')->name('admin.facilities.store');
	Route::put('/facilities/{facility}', 'FacilityController@update')->name('admin.facilities.update');
	
	Route::get('/pages/about', 'Admin\AdminController@about')->name('admin.about');
	Route::post('/pages/about', 'Admin\AdminController@updateAbout')->name('admin.about.update');

	Route::get('/pages/contact', 'Admin\AdminController@contact')->name('admin.contact');
	Route::post('/pages/contact', 'Admin\AdminController@updateContact')->name('admin.contact.update');
});
