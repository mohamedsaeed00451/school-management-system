<?php

namespace App\Interfaces;

interface QuestionsInterface
{
    public function index();
    public function create();
    public function createNew($id);
    public function show($id);
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
}
