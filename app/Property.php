<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
	use SoftDeletes;
	protected $guarded = [''];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function scopeMine($query)
	{
		return $query->where('user_id', auth()->user()->id);
	}

	public function scopePublished($query)
	{
		return $query->where('published', true);
	}

	public function scopeUnpublished($query)
	{
		return $query->where('published', false);
	}

	public function createSlug($title)
	{
		$slug = str_slug($title);
		if (Property::where('slug', $slug)->count()) {
			return $slug . '-' .time();
		}
		return $slug;
	}

	public function city()
	{
		return $this->belongsTo('App\City');
	}

	public function images()
	{
		return $this->hasMany('App\PropertyImage');
	}


}
