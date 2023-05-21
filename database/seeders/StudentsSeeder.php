<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        Student::create([
            'Name' => ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'],
            'email' => 's1@gmail.com',
            'password' => Hash::make('12345678'),
            'Birth_date' => date('Y-m-d'),
            'Academic_year' => date('Y'),
            'Gender_id' => Gender::all()->unique()->random()->id,
            'Nationalitie_id' => Nationalitie::all()->unique()->random()->id,
            'Blood_id' => BloodType::all()->unique()->random()->id,
            'Grade_id' => Grade::all()->unique()->random()->id,
            'Classroom_id' => Classroom::all()->unique()->random()->id,
            'Section_id' => Section::all()->unique()->random()->id,
            'Parent_id' => MyParent::all()->unique()->random()->id,
        ]);
    }
}
