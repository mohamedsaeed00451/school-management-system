<?php

namespace App\Interfaces;

interface StudentsPromotionsInterface
{
    public function index();
    public function create();
    public function store($request);
    public function destroy($request);
}
