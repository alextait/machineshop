<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HireCategory extends Model
{
   	public function hire()
	{
		return $this->hasMany('App\Hire');
	}
}
