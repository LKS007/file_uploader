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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('index');
});

Route::get('admin/id', 'AdminController@show');
Route::get('admin/', 'AdminController@dashboard')->name('admin');

Route::group(['prefix' => 'admin'], function(){
    Route::resource('videos', 'VideoController');
});

Route::group(['prefix' => 'admin'], function(){
    Route::resource('files', 'FileController');
});

Route::get('admin/files/{file}/download', 'FileController@download')->name('files.download');

//Route::post('/api/v1/employees', 'FileController@create');
//Route::get('/api/v1/employees', 'FileController@show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
