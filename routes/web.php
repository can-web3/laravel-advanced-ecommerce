<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'getHome')->name('getHome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/kayit-ol', 'getRegister')->name('getRegister');
    Route::post('/kayit-ol', 'postRegister')->name('postRegister');
    Route::get('/giris-yap', 'getLogin')->name('getLogin');
    Route::post('/giris-yap', 'postLogin')->name('postLogin');
    Route::get('/cikis-yap', 'getLogout')->name('getLogout');
});


Route::prefix('/panel')->middleware('auth')->name('panel.')->group(function(){
    Route::controller(PanelController::class)->group(function(){
        Route::get('/', 'getDashboard')->name('getDashboard');
        Route::get('/profil', 'getProfile')->name('getProfile');
    });

    Route::middleware('role:admin')->group(function(){
        Route::resource('/kategoriler', CategoryController::class, ['names' => 'categories']);
    });

});


