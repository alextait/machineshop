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
Route::get('/view-project/{projectid}',  ['uses' =>'ProjectController@getViewProject'] );

//Other Links
Route::get('/hire', 'StaticPagesController@getHire');
Route::get('/news', 'ProjectController@getNews');
Route::get('/about', 'ProjectController@getAbout');
Route::get('/contact', 'StaticPagesController@getContact');

//Admin

Route::resource('image' , 'ImageController', ['except' => 'destroy']);
Route::delete('/image/destroy/{image_id}/{project_id}',  ['uses' =>'ImageController@destroy'] );


Route::resource('project' , 'ProjectController');

Route::resource('categoryproject' , 'CategoryProjectController', ['except' => 'destroy']);

Route::delete('/categoryproject/destroy/{project_id}/{category_id}',  ['uses' =>'CategoryProjectController@destroy'] );

Route::get('/populatedata', 'MainController@populateData');

