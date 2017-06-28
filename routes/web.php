<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Project Routes
Route::get('/', 'ProjectController@getProjectHighlight');
Route::get('/special-projects/{categoryid}', ['uses' =>'ProjectController@getSpecialProjects'] );
Route::get('/special-effects/{categoryid}',  ['uses' =>'ProjectController@getSpecialEffectsProjects'] );
//??? Perhaps this should be taken over by the resource show event????
Route::get('/view-project/{displayitemid}',  ['uses' =>'ProjectController@getViewProject'] );

//Other Links
Route::get('/hire', 'StaticPagesController@getHire');
Route::get('/news', 'ProjectController@getNews');
Route::get('/about', 'ProjectController@getAbout');
Route::get('/contact', 'StaticPagesController@getContact');

//Admin
Route::resource('displayitem' , 'DisplayItemController');
Route::get('/populatedata', 'MainController@populateData');

