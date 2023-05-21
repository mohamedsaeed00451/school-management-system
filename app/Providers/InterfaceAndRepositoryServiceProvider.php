<?php

namespace App\Providers;

use App\Interfaces\AttendanceInterface;
use App\Interfaces\ClassroomsInterface;
use App\Interfaces\FeeInterface;
use App\Interfaces\FeeInvoicesInterface;
use App\Interfaces\GradesInterface;
use App\Interfaces\OnlineClassInterface;
use App\Interfaces\Parents\ParentProfileInterface;
use App\Interfaces\Parents\ParentStudentInterface;
use App\Interfaces\PaymentExpensesInterface;
use App\Interfaces\ProcessingFeesInterface;
use App\Interfaces\QuestionsInterface;
use App\Interfaces\QuizzesInterface;
use App\Interfaces\ReceiptExpensesInterface;
use App\Interfaces\SectionsInterface;
use App\Interfaces\Students\StudentProfileInterface;
use App\Interfaces\StudentsGraduateInterface;
use App\Interfaces\StudentsInterface;
use App\Interfaces\StudentsPromotionsInterface;
use App\Interfaces\SubjectsInterface;
use App\Interfaces\Teachers\TeacherDashboardInterface;
use App\Interfaces\Teachers\TeacherLibraryInterface;
use App\Interfaces\Teachers\TeacherOnlineClassInterface;
use App\Interfaces\Teachers\TeacherProfileInterface;
use App\Interfaces\Teachers\TeacherQuestionInterface;
use App\Interfaces\Teachers\TeacherQuizzeInterface;
use App\Interfaces\TeachersInterface;
use App\Interfaces\LibraryInterface;

use App\Repositories\AttendanceRepository;
use App\Repositories\ClassroomsRepository;
use App\Repositories\FeeInvoicesRepository;
use App\Repositories\FeeRepository;
use App\Repositories\GradesRepository;
use App\Repositories\OnlineClassRepository;
use App\Repositories\Parents\ParentProfileRepository;
use App\Repositories\Parents\ParentStudentRepository;
use App\Repositories\PaymentExpensesRepository;
use App\Repositories\ProcessingFeesRepository;
use App\Repositories\QuestionsRepository;
use App\Repositories\QuizzesRepository;
use App\Repositories\ReceiptExpensesRepository;
use App\Repositories\SectionsRepository;
use App\Repositories\Students\StudentProfileRepository;
use App\Repositories\StudentsGraduateRepository;
use App\Repositories\StudentsPromotionsRepository;
use App\Repositories\StudentsRepository;
use App\Repositories\SubjectsRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\LibraryRepository;
use App\Repositories\Teachers\TeacherDashboardRepository;
use App\Repositories\Teachers\TeacherLibraryRepository;
use App\Repositories\Teachers\TeacherOnlineClassRepository;
use App\Repositories\Teachers\TeacherProfileRepository;
use App\Repositories\Teachers\TeacherQuestionRepository;
use App\Repositories\Teachers\TeacherQuizzeRepository;

use Illuminate\Support\ServiceProvider;

class InterfaceAndRepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(TeachersInterface::class, TeacherRepository::class);
        $this->app->bind(TeacherDashboardInterface::class, TeacherDashboardRepository::class);
        $this->app->bind(TeacherQuizzeInterface::class, TeacherQuizzeRepository::class);
        $this->app->bind(TeacherQuestionInterface::class, TeacherQuestionRepository::class);
        $this->app->bind(TeacherOnlineClassInterface::class, TeacherOnlineClassRepository::class);
        $this->app->bind(TeacherProfileInterface::class, TeacherProfileRepository::class);
        $this->app->bind(TeacherLibraryInterface::class, TeacherLibraryRepository::class);

        $this->app->bind(StudentsInterface::class, StudentsRepository::class);
        $this->app->bind(StudentsPromotionsInterface::class, StudentsPromotionsRepository::class);
        $this->app->bind(StudentsGraduateInterface::class, StudentsGraduateRepository::class);
        $this->app->bind(StudentProfileInterface::class, StudentProfileRepository::class);

        $this->app->bind(FeeInvoicesInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(FeeInterface::class, FeeRepository::class);
        $this->app->bind(PaymentExpensesInterface::class, PaymentExpensesRepository::class);
        $this->app->bind(ProcessingFeesInterface::class, ProcessingFeesRepository::class);
        $this->app->bind(ReceiptExpensesInterface::class, ReceiptExpensesRepository::class);

        $this->app->bind(AttendanceInterface::class, AttendanceRepository::class);

        $this->app->bind(SubjectsInterface::class, SubjectsRepository::class);
        $this->app->bind(QuizzesInterface::class, QuizzesRepository::class);
        $this->app->bind(QuestionsInterface::class, QuestionsRepository::class);
        $this->app->bind(LibraryInterface::class, LibraryRepository::class);
        $this->app->bind(OnlineClassInterface::class, OnlineClassRepository::class);
        $this->app->bind(ClassroomsInterface::class, ClassroomsRepository::class);
        $this->app->bind(GradesInterface::class, GradesRepository::class);
        $this->app->bind(SectionsInterface::class, SectionsRepository::class);

        $this->app->bind(ParentProfileInterface::class, ParentProfileRepository::class);
        $this->app->bind(ParentStudentInterface::class, ParentStudentRepository::class);
    }

    public function boot()
    {
        //
    }
}
