<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryStore;
use App\Http\Requests\LibraryUpdate;
use App\Interfaces\Teachers\TeacherLibraryInterface;
use App\Models\Library;
use Illuminate\Http\Request;

class TeacherLibraryController extends Controller
{
    private $Library;
    public function __construct(TeacherLibraryInterface $Library)
    {
        $this->Library = $Library;
    }

    public function index()
    {
        return $this->Library->index();
    }

    public function create()
    {
        return $this->Library->create();
    }

    public function store(LibraryStore $request)
    {
        return $this->Library->store($request);
    }

    public function show(Library $library)
    {
        //
    }

    public function edit($id)
    {
        return $this->Library->edit($id);
    }

    public function update(LibraryUpdate $request)
    {
        return $this->Library->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Library->destroy($request);
    }
    public function download($fileName)
    {
        return $this->Library->download($fileName);
    }
}
