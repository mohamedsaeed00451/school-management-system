<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['ar' => 'حاسب آلى', 'en' => 'computer'],
            ['ar' => 'عربى', 'en' => 'Arabic'],
        ];
        DB::table('subjects')->delete();
        foreach ($subjects as $subject){
            Subject::create([
                'Name' => $subject,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Classroom_id' => Classroom::all()->unique()->random()->id,
                'Teacher_id' => Teacher::all()->unique()->random()->id,
        ]);
        }

    }
}
