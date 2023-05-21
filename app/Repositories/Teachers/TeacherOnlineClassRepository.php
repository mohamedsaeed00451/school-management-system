<?php

namespace App\Repositories\Teachers;

use App\Http\Traits\MeetingZoomTrait;
use App\Interfaces\Teachers\TeacherOnlineClassInterface;
use App\Models\Grade;
use App\Models\OnlineClass;
use App\Models\Student;
use App\Notifications\Admins\AddOnlineClassrooms;
use Exception;
use Illuminate\Support\Facades\Notification;
use MacsiDigital\Zoom\Facades\Zoom;

class TeacherOnlineClassRepository implements TeacherOnlineClassInterface
{
    use MeetingZoomTrait;

	public function index()
	{
        $online_classes = OnlineClass::where('Teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.Dashboard.OnlineClasses.index', compact('online_classes'));
	}

	public function create()
	{
        $Grades = Grade::all();
        return view('pages.Teachers.Dashboard.OnlineClasses.add', compact('Grades'));
	}

	public function store($request)
	{
        try {

            $meeting = $this->createMeetingZoom($request);
            OnlineClass::create([
                'Integration' => true,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id' => $request->Section_id,
                'Teacher_id' => auth()->user()->id,
                'Meeting_id' => $meeting->id,
                'Topic' => $request->Topic,
                'Start_at' => $request->Start_time,
                'Duration' => $request->Duration,
                'Password' => $meeting->password,
                'Start_url' => $meeting->start_url,
                'Join_url' => $meeting->join_url,
            ]);

            //send Notifications

            $students = Student::where('Grade_id', $request->Grade_id)
                ->where('Classroom_id',$request->Classroom_id)
                ->where('Section_id',$request->Section_id)
                ->get();

            Notification::send($students ,new AddOnlineClassrooms($request->Topic));

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('teacherOnlineClasses.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function indirectCreate()
	{
        $Grades = Grade::all();
        return view('pages.Teachers.Dashboard.OnlineClasses.indirect', compact('Grades'));
	}

	public function indirectStore($request)
	{
        try {

            OnlineClass::create([
                'Integration' => false,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id' => $request->Section_id,
                'Teacher_id' => auth()->user()->id,
                'Meeting_id' => $request->Meeting_id,
                'Topic' => $request->Topic,
                'Start_at' => $request->Start_time,
                'Duration' => $request->Duration,
                'Password' => $request->Password,
                'Start_url' => $request->Start_url,
                'Join_url' => $request->Join_url,
            ]);

            //send Notifications

            $students = Student::where('Grade_id', $request->Grade_id)
                ->where('Classroom_id',$request->Classroom_id)
                ->where('Section_id',$request->Section_id)
                ->get();

            Notification::send($students ,new AddOnlineClassrooms($request->Topic));

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('teacherOnlineClasses.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function destroy($request)
	{
        try {

            $info = OnlineClass::findOrFail($request->id);

            if ($info->Integration == true) {
                Zoom::meeting()->find($request->meeting_id)->delete();
                OnlineClass::destroy($request->id);
            } else {
                OnlineClass::destroy($request->id);
            }

            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('teacherOnlineClasses.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
}
