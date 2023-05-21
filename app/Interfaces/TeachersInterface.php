<?php

namespace App\Interfaces;

interface TeachersInterface
{
    // Get All Teachers
    public function getTeachers();
    // Get All Specializations
    public function getSpecializations();
    // Create Teacher
    public function createTeachers();
    // Get All Genders
    public function getGenders();
    // Store Teachers
    public function storeTeacher($request);
    // Edit Teachers
    public function editTeacher($id);
    // Update Teachers
    public function updateTeacher($request);
    // Delete Teachers
    public function deleteTeacher($request);
}
