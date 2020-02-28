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

Route::get('/halaman', 'HomeController@keelas');
Route::get('profile','HomeController@profile');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/program', 'HomeController@kelas');
Route::post('/edit','editController@update');
Route::get('edit',function(){
	return view('edit');
});
// Route::get('halaman','uploadController@showall');


Route::prefix('admin')->group(function(){
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/users', 'AdminController@peserta')->name('admin.dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('home');
	Route::resource('kelas','LearnController');
	Route::resource('create','LearnController');
Route::get('konten','AdminController@konten');
Route::post('upload','uploadController@upload');
});


Route::prefix('posko')->group(function(){
	Route::get('/', 'PoskoController@index')->name('posko.dashboard');
	Route::get('/login','Auth\PoskoLoginController@showLoginForm')->name('posko.login');
	Route::post('/login','Auth\PoskoLoginController@login')->name('posko.login.submit');
});







