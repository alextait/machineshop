<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    /**
     * Get the hire category for the hire.
     */
    public function hireCategory()
    {
        return $this->belongsTo('App\HireCategory' );
    }
}
