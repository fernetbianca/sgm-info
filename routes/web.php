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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/apropos', function () {
//     return view('pages.about');
// });
Route::get('/', 'PagesController@index');
Route::get('/services', 'PagesController@services');
Route::get('/apropos', 'PagesController@apropos');

Route::get('/users/{id}', function($id) {
    //url avec param
    return "ceci est un texte engendré à partir du param URL suivant:". $id;
});
Route::resource('Posts', 'PostsController');


Auth::routes();
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

Auth::routes();
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

Auth::routes();
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
