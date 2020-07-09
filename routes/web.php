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

Route::get('/', 'HomeController@welcome');

Route::get('/admin/dashboard/{user}', 'HomeController@admin_index');
Route::get('/dashboard/{user}', 'HomeController@index');

Auth::routes();

Route::resource('/admin/users', 'Admin\UserController');

Route::resource('/admin/clients', 'Admin\ClientController');

Route::put('/admin/projects/complete/{id}', 'Admin\ProjectController@complete');
Route::resource('/admin/projects', 'Admin\ProjectController');
Route::post('/files/fileupload/','Admin\ProjectController@fileUpload')->name('files.fileupload');
Route::get('/admin/projects/download/{id}', 'Admin\ProjectController@projectFileDownload');

Route::get('/settings/{id}', 'UserSettingsController@index');
Route::post('/settings/fileupload/','UserSettingsController@fileUpload')->name('settings.fileupload');

Route::put('/settings/update/{id}', 'UsersettingsController@update');

Route::post('/messages', 'MessageController@store');
Route::put('/messages/{message}', 'MessageController@update');

Route::get('/admin/archives', 'Admin\ArchiveController@index' );

Route::get('/projects', 'Users\EmployeeController@index');
Route::get('/projects/{id}', 'Users\EmployeeController@show');