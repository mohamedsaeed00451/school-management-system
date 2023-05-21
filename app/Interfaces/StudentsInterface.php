<?php

namespace App\Interfaces;

interface StudentsInterface
{
    //Get Student
    public function getStudent();
    //Show Student
    public function showStudent($id);
    //Create Student
    public function createStudent();
    //Edit Sections
    public function editStudent($id);

    public function storeStudent($request);
    //Update Sections
    public function updateStudent($request);
    //Delete Sections
    public function deleteStudent($request);
    //Upload Attachment
    public function uploadAttachment($request);
    //Download Attachment
    public function downloadAttachment($StudentsName,$FileName);
    //Delete Attachment
    public function deleteAttachment($request);


}

