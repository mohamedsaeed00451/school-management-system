<?php

use App\Http\Controllers\Students\Dashboard\StudentDashboardController;
use App\Http\Controllers\Students\Dashboard\StudentLibraryController;
use App\Http\Controllers\Students\Dashboard\StudentOnlineClass;
use App\Http\Controllers\Students\Dashboard\StudentProfileController;
use App\Http\Controllers\Students\Dashboard\StudentQuizzesController;
use App\Http\Livewire\StudentQuizze;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| student Routes
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ],

    function () {

        Route::prefix('student')->group(function (){

            //********************** Dashboard *****************************//
            Route::get('/dashboard',[StudentDashboardController::class,'index']);

            //********************** Quizzes *****************************//
            Route::resource('/studentQuizzes',StudentQuizzesController::class);

            //********************** Profile *****************************//
            Route::resource('/studentProfile',StudentProfileController::class);

            //********************** Books *****************************//
            Route::controller(StudentLibraryController::class)->group(function (){
                Route::get('/books','index')->name('books.student.index');
                Route::get('/book/{fileName}','download')->name('book.download');
            });

            //********************** Online Classes *****************************//
            Route::get('/classrooms',[StudentOnlineClass::class,'index'])->name('student.classrooms');

        });

    }
);
