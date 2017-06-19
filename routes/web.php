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

Route::get('/', 'ProjectController@getProjectHighlight');


Route::get('/contact', 'StaticPagesController@getContact');
Route::get('/hire', 'StaticPagesController@getHire');


Route::get('/all-projects', function () {
    return view('special-projects');
});


Route::get('/special-projects', function () {
    return view('special-projects');
});

Route::get('/theatre-experiential', function () {
    return view('special-projects');
});













Route::get('/test', function () {
    return view('test');
});
