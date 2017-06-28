<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     //
   protected $table = 'categories';

   public function projects()
	{
		return $this->belongsToMany('App\Project', 'category_project');
	}
}
