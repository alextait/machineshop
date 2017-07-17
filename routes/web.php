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
Route::post('/project/results',  ['uses' =>'ProjectController@getViewSearchResults'] )->name('project.results');;

//Other Links
Route::get('/hire', 'StaticPagesController@getHire');
Route::get('/hire/equipment-hire', 'StaticPagesController@getEquipmentHire');

Route::get('/about', 'ProjectController@getAbout');
Route::get('/contact', 'StaticPagesController@getContact');

//Admin
Route::get('/admin', 'StaticPagesController@getAdminHome');


Route::resource('tags' , 'TagController', ['except' => 'create']);

Route::resource('image' , 'ImageController', ['except' => 'destroy']);
Route::delete('/image/destroy/{image_id}/{project_id}',  ['uses' =>'ImageController@destroy'] );


Route::resource('project' , 'ProjectController');

Route::resource('categoryproject' , 'CategoryProjectController', ['except' => 'destroy']);

Route::delete('/categoryproject/destroy/{project_id}/{category_id}',  ['uses' =>'CategoryProjectController@destroy'] );

Route::get('/populatedata', 'MainController@populateData');

Route::resource('news' , 'NewsController');

Route::get('/newslist', 'NewsController@getNews');

