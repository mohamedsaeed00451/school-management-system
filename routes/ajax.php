<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ============================== Translate all pages ============================ //

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],

    function () {

        Route::controller(AjaxController::class)->group(function (){

            Route::get('ajaxGetClassrooms/{id}','getClassrooms');
            Route::get('ajaxGetSections/{id}','getSections');

        });

    }
);
