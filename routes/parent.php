<?php

use App\Http\Controllers\Parents\Dashboard\ParentDashoardController;
use App\Http\Controllers\Parents\Dashboard\ParentProfileController;
use App\Http\Controllers\Parents\Dashboard\ParentStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ],

    function () {

        Route::prefix('parent')->group(function (){

            //********************** Dashboard *****************************//
            Route::get('/dashboard',[ParentDashoardController::class,'index']);

            //********************** Students *****************************//
            Route::controller(ParentStudentController::class)->group(function (){

                Route::get('/students','getStudents')->name('parent.students');

                //********************** Attendances *****************************//
                Route::get('/attendances','getAttendances')->name('parent.attendances');
                Route::post('/attendances','getStudentParentAttendances')->name('parent.attendances.search');
                Route::get('/attendances/report/details/{id}/{to}/{from}','attendanceDetailsStudent')->name('parent.attendance.report.show.details');

                //********************** Degrees *****************************//
                Route::get('/students/degrees','getQuizzesDegrees')->name('parent.students.degrees');
                Route::get('/student/degrees/{id}','getQuizzesStudentDegrees')->name('parent.student.degrees.one');

                //********************** Fees *****************************//
                Route::get('/students/fees','getStudentsFee')->name('parent.student.fees');
                Route::get('student/fee/{id}','getStudentFeeDetails')->name('parent.student.fees.details');
            });

            //********************** Profile *****************************//
            Route::resource('/parentProfile',ParentProfileController::class);
        });

    }
);
