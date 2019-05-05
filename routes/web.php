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

Route::get('/', function () {
    return view('site.frontpage');
});

Route::get('/about', function() {
    return view('site.about');
});

Route::get('/contact', function() {
    return view('site.contact');
}); 

Route::get('/render', 'RenderController@renderState');
Route::get('render/town', 'RenderController@renderTown');

Route::post('/gender', 'GenderWaliController@getGender');
Route::get('/gender', 'GenderWaliController@getGender');

Route::get('gender/wali', 'GenderWaliController@getWali');
Route::Post('gender/wali', 'GenderWaliController@getwali');

Route::get('/profile', 'UserController@show');


Route::get('/home', 'HomeController@index');

Auth::routes();