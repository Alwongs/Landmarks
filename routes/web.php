<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/world/country/{slug?}', 'WorldController@cities')->name('cities');
Route::get('/world/city/{slug?}', 'WorldController@places')->name('places');
Route::get('/world/place/{slug?}', 'WorldController@onePlace')->name('onePlace');
Route::resource('/comment', 'CommentController', ['as' => 'world']);
Route::post('/world/picture/create', 'WorldController@createPicture')->name('world.picture.create');
Route::get('/world/picture/{place_id?}', 'WorldController@openGallery')->name('world.picture.index');




Route::get('/yourhome/pictures/{place}/', 'Admin\PicturesController@show')->name('admin.pictures.place');

Route::group(['prefix' => 'yourhome', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');

  Route::resource('/country', 'CountryController', ['as' => 'admin']);
  Route::resource('/city', 'CityController', ['as' => 'admin']);
  Route::resource('/place', 'PlaceController', ['as' => 'admin']);
  Route::resource('/comment', 'CommentController', ['as' => 'admin']);
  Route::resource('/picture', 'PictureController', ['as' => 'admin']);
  Route::group(['prefix' => 'user_management', 'namespace' => 'UserManagement'], function () {
    Route::resource('/user', 'UserController', ['as' => 'admin.user_management']);
  });
});


Route::get('/', 'WorldController@index')->name('welcom');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');










Route::get('/storagelink', function () {
  Artisan::call('storage:link');
  echo 'linked probably';
});

Route::get('/clear', function () {
  Artisan::call('config:cache');
  echo 'cleared';
});

Route::get('/intervention/image', function () {
  Artisan::call('composer require intervention/image');
  echo 'intervention-image done';
});
