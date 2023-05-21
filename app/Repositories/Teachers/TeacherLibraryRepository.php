<?php

namespace App\Repositories\Teachers;

use App\Interfaces\Teachers\TeacherLibraryInterface;
use App\Models\Grade;
use App\Models\Library;
use App\Models\Section;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Storage;

class TeacherLibraryRepository implements TeacherLibraryInterface
{

	public function index()
	{
        $sections_ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('section_id');
        $books = Library::whereIn('Section_id',$sections_ids)->get();
        return view('pages.Teachers.Dashboard.Books.index',compact('books'));
	}

	public function create()
	{
        $grades = Grade::all();
        return view('pages.Teachers.Dashboard.Books.create', compact('grades'));
	}

	public function edit($id)
	{
        $grades = Grade::all();
        $book = Library::findOrFail($id);
        return view('pages.Teachers.Dashboard.Books.edit', compact('grades', 'book'));
	}

	public function store($request)
	{
        try {

            $fileName = $request->file('File_name')->getClientOriginalName();

            Library::create([
                'Title' => $request->Title,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id' => $request->Section_id,
                'Teacher_id' => auth()->user()->id,
                'File_name' => $fileName,
            ]);

            $request->file('File_name')->storeAs('Books/', $fileName, 'Attachments');

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('books.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function update($request)
	{
        try {

            $book = Library::findOrFail($request->id);
            $fileName = $book->File_name;

            if ($request->hasfile('File_name')) {
                $fileName = $request->file('File_name')->getClientOriginalName();
                $exists = Storage::disk('Attachments')->exists('Books/' . $book->File_name);
                if ($exists) {
                    Storage::disk('Attachments')->delete('Books/' . $book->File_name);
                }
                $request->file('File_name')->storeAs('Books/', $fileName, 'Attachments');
            }

            Library::findOrFail($request->id)
                ->update([
                    'Title' => $request->Title,
                    'Grade_id' => $request->Grade_id,
                    'Classroom_id' => $request->Classroom_id,
                    'Section_id' => $request->Section_id,
                    'Teacher_id' => auth()->user()->id,
                    'File_name' => $fileName,
                ]);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('books.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function destroy($request)
	{
        try {

            $exists = Storage::disk('Attachments')->exists('Books/' . $request->File_name);
            if ($exists) {
                Storage::disk('Attachments')->delete('Books/' . $request->File_name);
            }
            Library::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('books.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function download($fileName)
	{
        return response()->download(public_path('Attachments/Books/' . $fileName));
	}
}
