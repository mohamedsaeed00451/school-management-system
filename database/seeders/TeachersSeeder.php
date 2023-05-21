<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        Teacher::create([
            'Name' => ['en' => 'Khaled Mohamed', 'ar' => 'خالد محمد'],
            'email' => 't1@gmail.com',
            'password' => Hash::make('12345678'),
            'Joining_Date' => date('Y-m-d'),
            'Address' => 'القاهرة',
            'Specialization_id' => Specialization::all()->unique()->random()->id,
            'Gender_id' => Gender::all()->unique()->random()->id,
        ]);
    }
}
