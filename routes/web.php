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

Route::get('/','Auth\LoginController@showLoginForm')->name('login');
 
Auth::routes();

Route::prefix('private')->middleware('auth')->group(function () {

	//Route Dashboard home
	Route::get('/home', 'HomeController@index')->name('home');

	//Route add Membre 
	Route::get('ajout-membre',['as'=>'page.add.membre','uses'=>'UsersController@index']);
	//Route insert Membre
	Route::post('insert-membre',['as'=>'page.insert.membre','uses'=>'UsersController@insert']);

	//Route show form for new Entite
	Route::get('entite',['as' => 'show.entity', 'uses' => 'EntitesController@show']);
	//Route insert a new Entite
	Route::post('add-entite',['as' => 'add.new.entity','uses'=>'EntitesController@insert']);

	//Route AJAX Entite 
	Route::get('getentite/{type}',['as' => 'get.entite','uses' => 'EntitesController@store'])->where('type','[a-z0-9\-]+');

	//Route form lists Budget 
	Route::get('add-budget',['as' => 'add.budget', 'uses' => 'BudgetsController@index']);
	//Create a new instance of Budget 
	Route::get('create-budget',['as' => 'create.budget', 'uses' => 'BudgetsController@create']);
	//Update a instance of Budget
	Route::post('update-budget',['as' => 'update.budget', 'uses' => 'BudgetsController@update']);

});


