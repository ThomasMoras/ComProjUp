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

use projetPhp\User;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::get('/', function () {
    $users = User::all();
    return view('welcome',['utilisateurs' => $users]);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@filter')->name('home');

//Route::get("/home",function(\Illuminate\Http\Request $request){
//    $url="/home/{$request->domaine}";
//    return redirect($url);
//});

Route::get('/profil', 'ProfilController@index')->name('profil');
Route::post('/profil', 'ProfilController@create')->name('profil');

Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@create')->name('search');

Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@show')
    ->name('conversations.show');
Route::post('/conversations/{user}', 'ConversationsController@store')->name('conversations.store');;

Route::get('/search-project', 'SearchProjectController@index')->name('search-project');

Route::get('/project_create', 'ProjectController@init')->name('project_create');
Route::post('/project_create', 'ProjectController@create')->name('project_create');

//Route::get('/project', 'ProjectController@modify')->name('project');
