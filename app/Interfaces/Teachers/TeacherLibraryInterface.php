<?php

namespace App\Interfaces\Teachers;

interface TeacherLibraryInterface
{
    public function index();
    public function create();
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function download($fileName);
}
