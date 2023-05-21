<?php

namespace App\Interfaces;

interface ClassroomsInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function delete_all($request);
    public function filter_classes($request);
}
