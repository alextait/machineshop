<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PopulateDatabase;

class MainController extends Controller
{
    //
    public function populateData(){
       	$PopulateDatabase = new PopulateDatabase();
    	$PopulateDatabase->populateData();

    	//$populateDisplayItemData::populateData();
      
    }



}
