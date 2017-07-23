<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PopulateDatabase;

class MainController extends Controller
{
    //
    public function populateData($table = ''){
       	
       	$PopulateDatabase = new PopulateDatabase($table);
    	$PopulateDatabase->populateData($table);

    	//$populateDisplayItemData::populateData();
      
    }



}
