<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller{
    


	//
	public function getHire(){
		return view('welcome');
	}

	//
	public function getNews(){
		return view('welcome');
	}

	//
	public function getContact(){
		return view('welcome');
	}

}
