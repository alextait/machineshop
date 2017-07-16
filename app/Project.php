<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $table = 'projects';

	public function categories()
	{
		return $this->belongsToMany('App\Category', 'category_project' );
	}

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

	public function images()
    {
    	return $this->hasMany('App\Image');
    }
    
}
