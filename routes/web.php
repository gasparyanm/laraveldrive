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

Route::get('/', 'Auth\LoginController@redirectToGoogleProvider');

Auth::routes();

Route::get('/login', 'Auth\LoginController@redirectToGoogleProvider');
Route::get('/login/google', 'Auth\LoginController@redirectToGoogleProvider');
// works without / at the start
Route::get('oauth2callback', 'Auth\LoginController@oauth2callback');
// Route::get('/login/google/callback', 'Auth\LoginController@oauth2callback');

// show all files in root dir
Route::get('/drive', 'DriveController@getDrive'); // retreive folders

// delete specified file
Route::get('/drive/delete/{id}', 'DriveController@deleteFileOrFolder'); // Delete file or folder