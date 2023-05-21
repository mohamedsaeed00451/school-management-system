<?php

namespace App\Interfaces\Teachers;

interface TeacherOnlineClassInterface
{
    public function index();

    public function create();

    public function store($request);
    public function indirectCreate();
    public function indirectStore($request);

    public function destroy($request);
}
