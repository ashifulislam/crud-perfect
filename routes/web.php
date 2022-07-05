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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'customer'], function () {
    Route::get('/customer-list', 'App\Http\Controllers\Customer\CustomerController@customerList')->name('customer.customerList');
    Route::get('/customer-save', 'App\Http\Controllers\Customer\CustomerController@customerAdd')->name('customer.customerAdd');
    Route::post('/customer-save-process', 'App\Http\Controllers\Customer\CustomerController@customerAddProcess')->name('customer.customerAddProcess');
    Route::get('/customer-edit/{id}', 'App\Http\Controllers\Customer\CustomerController@customerEdit')->name('customer.customerEdit');
    Route::get('/customer-delete/{id}', 'App\Http\Controllers\Customer\CustomerController@customerDelete')->name('customer.customerDelete');

});
Route::get('customer/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('customerLogs');

