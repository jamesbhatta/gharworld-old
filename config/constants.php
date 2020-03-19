<?php

return [
	'property' => array(
		'posts_per_page' => '10',
		'posts_in_homepage' => '12',
		/*
		* The name of the directory where the images related to property will be stored
		*
		**/
		'property_image_dir' => 'property',
		'temp_image_dir' => 'temp',
	),

	/**
	 * The user details for seeding the database.
	  * Also create Admin using this configuration.
	**/
	'user' => array(
		'name' => 'Admin',
		'email' => 'jmsbhatta@gmail.com',
		'password' => 'password',
		'role' => 'admin'
	),

	'admin' => array(
		'items_per_table' => '25',
	),
];