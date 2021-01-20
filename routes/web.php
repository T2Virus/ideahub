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
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// User Rating
/*
Route::get('/rating', 'HomeController@getRating')->name('rating');
Route::post('/rating', 'HomeController@saveRating')->name('rating.save');
*/

//idea
Route::get('/my-ideas', 'HomeController@getMyIdea')->name('idea.own');
Route::get('/create-idea', 'UserController@createIdea')->name('idea.create');
Route::post('/create-idea', 'UserController@saveIdea');
Route::get('/idea/{idea_id}', 'HomeController@getIdea')->name('idea.view');
Route::get('/idea/edit/{idea_id}', 'UserController@editIdea')->name('idea.edit');
Route::post('/idea/edit/{idea_id}', 'UserController@updateIdea');
Route::get('/idea/delete/{idea_id}', 'UserController@deleteIdea')->name('idea.delete');

//search idea
Route::get('/search-idea', 'HomeController@searchIdea')->name('idea.search');

//invest an idea
Route::get('/invest-idea/{idea_id}', 'InvestorController@investIdea')->name('idea.invest');

