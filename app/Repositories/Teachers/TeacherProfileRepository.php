<?php

namespace App\Repositories\Teachers;

use App\Interfaces\Teachers\TeacherProfileInterface;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class TeacherProfileRepository implements TeacherProfileInterface
{

	public function index()
	{
        $information = Teacher::findOrFail(auth()->user()->id);
        return view('pages.Teachers.Dashboard.profile', compact('information'));
	}

	public function update($request)
	{
        try {

            if (!empty($request->Password)) {

                Teacher::findOrFail(auth()->user()->id)
                    ->update([
                        'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                        'password' => Hash::make($request->Password),
                    ]);

                toastr()->success(trans('Message_trans.Update'));
                return redirect()->route('teacherProfile.index');

            } else {

                Teacher::findOrFail(auth()->user()->id)
                    ->update([
                        'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                    ]);

                toastr()->success(trans('Message_trans.Update'));
                return redirect()->route('teacherProfile.index');
            }

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
}
