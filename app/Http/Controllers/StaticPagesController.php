<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller{
    
	public function getEquipmentHire(){
		return view('equipment-hire');
	}

	//
	public function getContact(){
		return view('contact');
	}

}
