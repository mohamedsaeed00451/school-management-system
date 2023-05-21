<?php

namespace App\Repositories\Students;

use App\Interfaces\Students\StudentProfileInterface;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Hash;

class StudentProfileRepository implements StudentProfileInterface
{

	public function index()
	{
        $information = Student::findOrFail(auth()->user()->id);
        return view('pages.Students.Dashboard.profile', compact('information'));
	}

	public function update($request)
	{
        try {

            if (!empty($request->Password)) {

                Student::findOrFail(auth()->user()->id)
                    ->update([
                        'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                        'password' => Hash::make($request->Password),
                    ]);

                toastr()->success(trans('Message_trans.Update'));
                return redirect()->route('studentProfile.index');

            } else {

                Student::findOrFail(auth()->user()->id)
                    ->update([
                        'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                    ]);

                toastr()->success(trans('Message_trans.Update'));
                return redirect()->route('studentProfile.index');
            }

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
}
