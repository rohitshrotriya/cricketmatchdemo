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

Auth::routes(['register' => false]);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'], function(){
 	Route::get ( '/add-team', 'TeamController@create')->name('admin.add.team')->middleware('auth');
	Route::post ( '/add-team', 'TeamController@store')->name('admin.save.team')->middleware('auth');
	Route::get ( '/add-tournament', 'TournamentController@create')->name('admin.add.tournament')->middleware('auth');
	Route::post ( '/add-tournament', 'TournamentController@store')->name('admin.save.tournament')->middleware('auth');


	Route::get ( '/add-player', 'PlayerController@create')->name('admin.add.player')->middleware('auth');
	Route::post ( '/add-player', 'PlayerController@store')->name('admin.save.player')->middleware('auth');

	Route::get ( '/add-playerteamtournament', 'PlayerTeamTournamentController@create')->name('admin.add.playerteamtournament')->middleware('auth');
	Route::post ( '/add-playerteamtournament', 'PlayerTeamTournamentController@store')->name('admin.save.playerteamtournament')->middleware('auth');

	Route::get ('/add-fixtures', 'FixtureController@create')->name('admin.add.fixtures')->middleware('auth');
	Route::post('/add-fixtures', 'FixtureController@store')->name('admin.save.fixtures')->middleware('auth');
	Route::get('/result-fixtures', 'FixtureController@fixturesResult')->name('admin.result.fixtures')->middleware('auth');
	Route::post('/save-result-fixtures', 'FixtureController@fixturesResultSave')->name('admin.result.save.fixtures')->middleware('auth');

});

Route::get ('teamlist', 'TeamController@teamList')->name('teamlist');
Route::get ('points', 'PointController@pointList')->name('points');


