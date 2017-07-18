<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;


class AdminController extends Controller
{
  /**
     * Instantiate a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAdminHome(){
        return view('admin.home');
    }

}
