<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/' , 'DashboardController@index')->name('dashboard');

Route::resource('employee', 'EmployeeController');
Route::get('datatables', 'EmployeeController@datatables')->name('employee.datatables');

Route::get("users_with_cache", "EmployeeController@withCache");
Route::get("users_with_query", "EmployeeController@getUser");

Route::prefix('certificate')->group(function() {
    Route::get('/', 'CertificateController@index')->name('certificate');
    Route::get('create', 'CertificateController@create')->name('certificate.create');
    Route::post('store', 'CertificateController@store')->name('certificate.store');
});

Route::prefix('trainer')->group(function() {
    Route::get('/', 'TrainerController@index')->name('trainer');
    Route::get('create', 'TrainerController@create')->name('trainer.create');
    Route::post('store', 'TrainerController@store')->name('trainer.store');
    Route::get('edit/{id}', 'TrainerController@edit')->name('trainer.edit');
    Route::post('update/{id}', 'TrainerController@update')->name('trainer.update');
});


