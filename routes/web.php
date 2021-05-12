<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainEntryController;

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

Route::group(['middleware'=>['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    Route::group(['prefix'=>'main_entry'], function () {
        Route::resource('low_concrete', MainEntryController::class);
        Route::resource('high_concrete', MainEntryController::class);
        Route::resource('low_timber', MainEntryController::class);
        Route::resource('high_timber', MainEntryController::class);
        Route::resource('ware_house', MainEntryController::class);
    });

    Route::group(['prefix'=>'cost-estimate'], function () {
        Route::get('/form-1','App\Http\Controllers\CostEstimateFormController@index')->name('cost-estimate.form_1');
        Route::get('/form-1/getResults','App\Http\Controllers\CostEstimateFormController@getResults');
    });
    
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
