<?php

namespace App\Interfaces;

interface StudentsGraduateInterface
{
    public function index();
    public function create();
    public function softDelete($request);
    public function returnStudentBack($request);
    public function destroy($request);
}
