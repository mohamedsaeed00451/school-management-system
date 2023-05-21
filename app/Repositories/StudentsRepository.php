<?php

namespace App\Repositories;

use App\Interfaces\StudentsInterface;
use App\Models\BloodType;
use App\Models\FeeInvoice;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Student;
use App\Notifications\Parents\AddStudentNotification;
use App\Notifications\parents\DeleteStudentNotification;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentsRepository implements StudentsInterface
{
    public function createStudent()
    {
        $data = [
            'my_classes' => Grade::all(),
            'parents' => MyParent::all(),
            'Genders' => Gender::all(),
            'nationals' => Nationalitie::all(),
            'bloods' => BloodType::all(),
        ];
        return view('pages.Students.add', $data);
    }

    public function storeStudent($request)
    {
        DB::beginTransaction();
        try {
            $Student = Student::create([
                'Name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'Gender_id' => $request->gender_id,
                'Nationalitie_id' => $request->nationalitie_id,
                'Blood_id' => $request->blood_id,
                'Birth_date' => $request->Date_Birth,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id' => $request->Section_id,
                'Parent_id' => $request->parent_id,
                'Academic_year' => $request->academic_year
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $imageName = $file->getClientOriginalName();
                    //Upload In Database
                    Image::create([
                        'filename' => $imageName,
                        'imageable_id' => $Student->id,
                        'imageable_type' => Student::class, //App\Models\Student
                    ]);
                    //Upload In Server
                    $file->storeAs('Students/' . $Student->Email, $imageName, 'Attachments');
                }
            }

            //send Notifications

            $parent = MyParent::find($request->parent_id);
            $parent->notify(new AddStudentNotification($request->name_ar));

            DB::commit();
            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('Students.index');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getStudent()
    {
        $students = Student::all();
        return view('pages.Students.index', compact('students'));
    }

    public function editStudent($id)
    {
        $data = [
            'Grades' => Grade::all(),
            'Parents' => MyParent::all(),
            'Genders' => Gender::all(),
            'Nationals' => Nationalitie::all(),
            'Bloods' => BloodType::all(),
        ];
        $Students = Student::findOrFail($id);
        return view('pages.Students.edit', $data, compact('Students'));
    }

    public function updateStudent($request)
    {
        try {

            $student = Student::findOrFail($request->id);

            $password = $student->password;
            if (!empty($request->password)) {
                $password = Hash::make($request->password);
            }
            $student->update([
                'Name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'email' => $request->email,
                'password' => $password,
                'Gender_id' => $request->gender_id,
                'Nationalitie_id' => $request->nationalitie_id,
                'Blood_id' => $request->blood_id,
                'Birth_date' => $request->Date_Birth,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id' => $request->Section_id,
                'Parent_id' => $request->parent_id,
                'Academic_year' => $request->academic_year
            ]);
            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Students.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteStudent($request)
    {
        try {

            $images = Image::where('imageable_id', $request->id)->where('imageable_type', Student::class)->pluck('filename');
            $student = Student::findOrFail($request->id);

            if ($images) {
                foreach ($images as $image) {
                    $exists = Storage::disk('Attachments')->exists('Students/' . $student->Email . '/' . $image);
                    if ($exists) {
                        Storage::disk('Attachments')->delete('Students/' . $student->Email . '/' . $image);
                    }
                }
                $path = public_path('Attachments/Students/' . $student->Email);
                if (is_dir($path)) {
                    rmdir($path);
                }
            }

            Image::where('imageable_id', $request->id)->where('imageable_type', Student::class)->delete();
            FeeInvoice::where('Student_id',$request->id)->delete();
            $student->forceDelete();

            //send Notifications

            $parent = MyParent::find($student->Parent_id);
            $parent->notify(new DeleteStudentNotification($student->Name));


            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('Students.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function showStudent($id)
    {
        $Student = Student::findOrFail($id);
        return view('pages.Students.show', compact('Student'));
    }

    public function downloadAttachment($StudentsEmail, $FileName)
    {
        return response()->download(public_path('Attachments/Students/' . $StudentsEmail . '/' . $FileName));
    }

    public function deleteAttachment($request)
    {
        try {
            //Delete From Server
            Storage::disk('Attachments')->delete('Students/' . $request->studentEmail . '/' . $request->filename);
            //Delete From Database
            Image::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function uploadAttachment($request)
    {
        try {
            foreach ($request->file('photos') as $file) {
                $imageName = $file->getClientOriginalName();
                //Upload In Database
                Image::create([
                    'filename' => $imageName,
                    'imageable_id' => $request->student_id,
                    'imageable_type' => Student::class, //App\Models\Student
                ]);
                //Upload In Server
                $file->storeAs('Students/' . $request->studentEmail, $imageName, 'Attachments');
            }
            toastr()->success(trans('Message_trans.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
