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
	Route::get('lists-budgets',['as' => 'budget.list', 'uses' => 'ComptesController@list']);
	//Show form to create a new instance of Budget 
	Route::get('create-budget',['as' => 'create.budget', 'uses' => 'BudgetsController@create']);
	//Action: Insertion d'une nouvelle instance Budget
	Route::post('insert-budget',['as' => 'insert.budget', 'uses' => 'BudgetsController@insert']);
	//Affichage formulaire de l'Instance Budget
	Route::get('show/{cryptid}',['as' => 'budget.show', 'uses' => 'BudgetsController@show'])->middleware('decryptid');
	//Action: Mise à jour Instance Budget
	Route::post('update-budget',['as' => 'budget.update', 'uses' => 'BudgetsController@update']);
	//Affichage de la page de selection pour importation
	Route::get('selection',['as' => 'budget.selection','uses' => 'BudgetsController@selection']);
	//Affichage de la page d'importation manuelle
	Route::post('import-manual-budget',['as' => 'budget.manual', 'uses' => 'BudgetsController@manual']);

	//Selection d'un budget dans la table d'historique
	Route::get('selection-budgetaire/{annee}',['as' => 'select.budget','uses' => 'BudgetsController@select_budget'])->where('annee','[0-9]+');
	//Suppression d'un budget
	Route::post('suppression-budget',['as' => 'budget.confirmation','uses' => 'BudgetsController@confirmation']);
	//Registration des budgets
	Route::get('registres-des-budgets',['as' => 'budget.register','uses' => 'BudgetsController@registration']);

	//Realisations 
	Route::get('realisations',['as' => 'realisation.index','uses' => 'RealisationsController@index']);
});


