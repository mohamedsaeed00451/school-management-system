<?php

namespace App\Http\Controllers\Sections;

use App\Http\Requests\StoreSections;
use App\Interfaces\SectionsInterface;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SectionController extends Controller
{
    private $Sections;

    public function __construct(SectionsInterface $Sections)
    {
        $this->Sections = $Sections;
    }

    public function index()
    {
        return $this->Sections->index();
    }

    public function create()
    {
        //
    }

    public function store(StoreSections $request)
    {
        return $this->Sections->store($request);
    }

    public function show(Section $section)
    {
        //
    }

    public function edit(Section $section)
    {
        //
    }

    public function update(StoreSections $request)
    {
        return $this->Sections->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Sections->destroy($request);
    }

}
