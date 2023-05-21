<?php

namespace App\Repositories;

use App\Interfaces\TeachersInterface;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Models\User;
use App\Notifications\Teachers\AddTeacherNotification;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class TeacherRepository implements TeachersInterface
{

    public function getTeachers()
    {
        $Teachers = Teacher::all();
        return view('pages.Teachers.Teachers', compact('Teachers'));
    }

    public function getSpecializations()
    {
        return Specialization::all();
    }

    public function getGenders()
    {
        return Gender::all();
    }

    public function createTeachers()
    {
        $specializations = $this->getSpecializations();
        $genders = $this->getGenders();
        return view('pages.Teachers.create', compact('specializations', 'genders'));
    }

    public function storeTeacher($request)
    {
        try {
           $teacher = Teacher::create([
                'email' => $request->Email,
                'password' => Hash::make($request->Password),
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Specialization_id' => $request->Specialization_id,
                'Gender_id' => $request->Gender_id,
                'Joining_Date' => $request->Joining_Date,
                'Address' => $request->Address,
            ]);

           //send Notifications

            $teachers = Teacher::where('id','!=',$teacher->id)->get();
            $admins = User::where('id','!=',auth()->user()->id)->get();
            Notification::send($admins, new AddTeacherNotification($request->Name_ar));
            Notification::send($teachers, new AddTeacherNotification($request->Name_ar));

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function editTeacher($id)
    {
        $Teachers = Teacher::findOrfail($id);
        $specializations = $this->getSpecializations();
        $genders = $this->getGenders();
        return view('pages.Teachers.Edit', compact('specializations', 'genders', 'Teachers'));
    }

    public function updateTeacher($request)
    {
        try {

            $Teacher = Teacher::findOrFail($request->id);

            $password = $Teacher->password;
            if (!empty($request->Password)) {
                $password = Hash::make($request->Password);
            }

            $Teacher->update([
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'email' => $request->Email,
                'password' => $password,
                'Specialization_id' => $request->Specialization_id,
                'Gender_id' => $request->Gender_id,
                'Joining_Date' => $request->Joining_Date,
                'Address' => $request->Address,
            ]);
            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteTeacher($request)
    {
        try {
            Teacher::findOrFail($request->id)->delete();
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
