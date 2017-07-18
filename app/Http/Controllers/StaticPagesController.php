<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller{
    

	//
	public function getHire(){
		return view('hire');
	}

	public function getEquipmentHire(){
		return view('equipment-hire');
	}



	//
	public function getContact(){
		return view('contact');
	}

}
