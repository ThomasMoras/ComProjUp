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
Route::get('/profil/{user}', 'ProfilController@view')->name('profil.view');
Route::get('/profil/askContact/{user}', 'ProfilController@askContact')->name('profil/askContact');
Route::get('/profil/response/1/{user}', 'ProfilController@responseT')->name('profil/response/1');
Route::get('/profil/response/0/{user}', 'ProfilController@responseF')->name('profil/response/0');

Route::get('/notification', 'ProfilController@notification')->name('notification');

Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@create')->name('search');

Route::get('/conversations', 'ConversationsController@index')->name('conversations');
Route::get('/conversations/{user}', 'ConversationsController@show')
    ->name('conversations.show');
Route::post('/conversations/{user}', 'ConversationsController@store')->name('conversations.store');;

Route::get('/search-project', 'SearchProjectController@index')->name('search-project');

Route::get('/project', 'ProjectController@init')->name('project.init');
Route::get('/project/{project}', 'ProjectController@modify')->name('project.modify');
Route::post('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/project/update/{project}', 'ProjectController@update')->name('project.update');

Route::get('/project/show/{project}', 'ProjectController@view')->name('project.view');




//Route::post('/project/update/{id}', function ($id) {
//
//    return 'Project '.$id;
//});

//
//Route::get('project_create/{id?}', function ($id = null) {
//    return $id;
//});
//
//Route::get('user/{id?}', function ($id = 0) {
//    return $id;
//});

//Route::get('/project', 'ProjectController@modify')->name('project');
