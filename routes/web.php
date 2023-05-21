<?php

use App\Http\Controllers\Attendances\AttendanceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Books\LibraryController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Expenses\FeeController;
use App\Http\Controllers\Expenses\FeeInvoiceController;
use App\Http\Controllers\Expenses\PaymentExpensesController;
use App\Http\Controllers\Expenses\ProcessingFeeController;
use App\Http\Controllers\Expenses\ReceiptExpensesController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Notification;
use App\Http\Controllers\OnlineClasses\OnlineClassController;
use App\Http\Controllers\Quizzes\QuestionController;
use App\Http\Controllers\Quizzes\QuizzeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Livewire\Calendar;
use App\Models\StudentAccountExpenses;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
//require __DIR__ . '/auth.php';

Route::group(
    [
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'guest'],
        'prefix' => LaravelLocalization::setLocale(),
    ],
    function () {

                 //*********************** Login *******************//
        Route::get('/', [AuthenticatedSessionController::class, 'index'])->name('selection');
        Route::get('login/{type}', [AuthenticatedSessionController::class, 'create'])->name('login.show');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
    }
);

            //*********************** Logout *******************//
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

            //*********************** Notifications *******************//
Route::get('/read-notification/{id}/{route}',[Notification::class,'readNotification'])->name('readNotification');
Route::get('/read-notifications/{id}',[Notification::class,'readNotifications'])->name('readNotifications');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth'],
    ],

    function () {

        //************************ Dashboard **************************//

        Route::get('/admin/dashboard', [AuthenticatedSessionController::class,'dashboard']);
        Livewire::component('calendar', Calendar::class);

        //********************** Grades *****************************//

        Route::resource('Grades', GradeController::class);

        //********************** Classes *****************************//

        Route::resource('Classrooms', ClassroomController::class);
        Route::post('Classrooms/Delete/all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post('Classrooms/Filter/Classes', [ClassroomController::class, 'filter_classes'])->name('filter_classes');

        //********************** Sections *****************************//

        Route::resource('Sections', SectionController::class);

        //********************** parents *****************************//

        Route::view('Parents', 'livewire.Parents.show_form')->name('Parents');

        //********************** Teachers *****************************//

        Route::resource('Teachers', TeacherController::class);

        //********************** Students *****************************//

        Route::resource('Students', StudentController::class);
        Route::resource('Promotions', PromotionController::class);
        Route::resource('Graduates', GraduatedController::class);

        Route::get('Download_attachment/{StudentsEmail}/{FileName}', [StudentController::class, 'downloadAttachment']);
        Route::post('Delete_attachment', [StudentController::class, 'deleteAttachment']);
        Route::post('Upload_Attachment', [StudentController::class, 'uploadAttachment']);

        //********************** Expenses *****************************//

        Route::resource('Fees', FeeController::class);
        Route::resource('Fee_invoices', FeeInvoiceController::class);
        Route::resource('Receipts', ReceiptExpensesController::class);
        Route::resource('Payments', PaymentExpensesController::class);
        Route::resource('Processing_fees', ProcessingFeeController::class);
        Route::resource('Student_expenses', StudentAccountExpenses::class);

        //********************** Attendances *****************************//

        Route::resource('attendances', AttendanceController::class);

        //********************** Subjects *****************************//

        Route::resource('subjects', SubjectController::class);

        //********************** Quizzes And Questions *****************************//

        Route::resource('/quizzes', QuizzeController::class);
        Route::resource('/questions', QuestionController::class);
        Route::get('/createNew/{id}', [QuestionController::class, 'createNew'])->name('createNew');

        //********************** Online Classes *****************************//

        Route::resource('/online_classes', OnlineClassController::class);
        Route::get('/indirect', [OnlineClassController::class, 'indirectCreate'])->name('indirect.create');
        Route::post('/indirect', [OnlineClassController::class, 'indirectStore'])->name('indirect.store');

        //********************** Library *****************************//

        Route::resource('libraries', LibraryController::class);
        Route::get('downloadAttachment/{FileName}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');

        //********************** Settings *****************************//

        Route::resource('settings', SettingController::class);
    }
);

// Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
