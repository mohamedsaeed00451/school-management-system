<?php

namespace App\Interfaces\Teachers;

interface TeacherQuizzeInterface
{
    public function index();
    public function create();
    public function show($id);
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function getQuizzesDegrees();
    public function repetQuizzesDegrees($id);
}
