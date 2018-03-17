<?php

/*
|-------------------------------administration----Administration---------------------------------
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



Route::resource( 'students', 'StudentsController' );
Route::resource( 'courses', 'CoursesController' );
Route::resource( 'admins', 'AdminsController' );

Route::get( 'school', 'SchoolController@index' );



Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
