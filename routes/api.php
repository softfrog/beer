<?php

use Illuminate\Http\Request;
Use App\Beer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//create new user
Route::post('register', 'Auth\RegisterController@register');

//login to existing user
Route::post('login', 'Auth\LoginController@login');

//logout of current session
Route::post('logout', 'Auth\LoginController@logout');

//require api_token
Route::group(['middleware' => 'auth:api'], function() {
	//create new beer
	Route::post('beers', 'BeerController@store');

	//view all beers
	Route::get('beers', 'BeerController@index');

	//rate a beer (on all/only provided attributes)
	Route::post('reviews', 'ReviewController@store');

	//view all ratings for a beer
	Route::get('reviews/{beer}', 'ReviewController@show');

	//view overall rating for a beer
	Route::get('overall/{beer}', 'ReviewController@overall');
});
