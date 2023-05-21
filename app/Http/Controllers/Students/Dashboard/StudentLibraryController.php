<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Library;

class StudentLibraryController extends Controller
{
    public function index()
    {
        $books = Library::where('Grade_id',auth()->user()->Grade_id)
            ->where('Classroom_id',auth()->user()->Classroom_id)
            ->where('Section_id',auth()->user()->Section_id)->get();

        return view('pages.Students.Dashboard.Books.index', compact('books'));
    }

    public function download($fileName)
    {
        return response()->download(public_path('Attachments/Books/' . $fileName));
    }
}
