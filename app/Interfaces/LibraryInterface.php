<?php

namespace App\Interfaces;

interface LibraryInterface
{
    public function index();
    public function create();
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function download($fileName);
}
