<?php

use App\Http\Controllers\Teachers\Dashboard\TeacherDashboardController;
use App\Http\Controllers\Teachers\Dashboard\TeacherLibraryController;
use App\Http\Controllers\Teachers\dashboard\TeacherOnlineClassController;
use App\Http\Controllers\Teachers\Dashboard\TeacherProfileController;
use App\Http\Controllers\Teachers\dashboard\TeacherQuestionController;
use App\Http\Controllers\Teachers\Dashboard\TeacherQuizzeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Teacher Routes
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher'],
    ],

    function () {

        Route::prefix('teacher')->group(function (){

            Route::controller(TeacherDashboardController::class)->group(function (){

                //********************** Dashboard *****************************//
                Route::get('/dashboard','dashboard');

                //********************** Students *****************************//
                Route::get('/students','getStudents')->name('students.show');
                Route::get('/students/{id}','getSectionStudents')->name('students.section.show');

                //********************** Sections *****************************//
                Route::get('/sections','getSections')->name('sections.show');

                //********************** Attendances *****************************//
                Route::post('/attendances/create','attendance')->name('attendance.store');
                Route::get('/attendances/report','attendanceReport')->name('attendance.report.show');
                Route::post('/attendances/report','attendanceSearch')->name('attendance.search');
                Route::get('/attendances/report/details/{id}/{to}/{from}','attendanceDetailsStudent')->name('attendance.report.show.details');

            });

            //********************** Quizzes *****************************//
            Route::controller(TeacherQuizzeController::class)->group(function (){

                Route::resource('/teacherQuizzes',TeacherQuizzeController::class);
                Route::get('/quizzes/report','getQuizzesDegrees')->name('teacher.quizzes.report');
                Route::get('/quizzes/repet/{id}','repetQuizzesDegrees')->name('teacher.quizzes.repet');

            });


            //********************** Questions *****************************//
            Route::resource('/teacherQuestions',TeacherQuestionController::class);
            Route::get('/createNew/{id}', [TeacherQuestionController::class, 'createNew'])->name('teacherCreateNewQuestion');

            //********************** Online Classes *****************************//
            Route::controller(TeacherOnlineClassController::class)->group(function (){

                Route::resource('/teacherOnlineClasses', TeacherOnlineClassController::class);
                Route::get('/indirect','indirectCreate')->name('teacher.indirect.create');
                Route::post('/indirect','indirectStore')->name('teacher.indirect.store');

            });

            //********************** Profile *****************************//
            Route::resource('/teacherProfile',TeacherProfileController::class);

            //********************** Books *****************************//
            Route::resource('/books',TeacherLibraryController::class);
            Route::get('/book/{fileName}',[TeacherLibraryController::class,'download'])->name('book.teacher.download');
        });

    });
