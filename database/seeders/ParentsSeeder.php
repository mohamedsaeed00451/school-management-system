<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_parents')->delete();
        MyParent::create([
            'email' => 'p1@gmail.com',
            'password' => Hash::make('12345678'),
            'Name_Father' => ['en' => 'Ahmed Saeed', 'ar' => 'أحمد سعيد'],
            'National_ID_Father' => '12345678912345',
            'Passport_ID_Father' => '12345678912345',
            'Phone_Father' => '1234567810',
            'Job_Father' => ['en' => 'programmer', 'ar' => 'مبرمج'],
            'Nationality_Father_ID' => Nationalitie::all()->unique()->random()->id,
            'Blood_Type_Father_ID' => BloodType::all()->unique()->random()->id,
            'Religion_Father_ID' => Religion::all()->unique()->random()->id,
            'Address_Father' => 'القاهرة',
            'Name_Mother' => ['en' => 'mona mohamed', 'ar' => 'مونة محمد'],
            'National_ID_Mother' => '12345678912345',
            'Passport_ID_Mother' => '12345678912345',
            'Phone_Mother' => '1234567810',
            'Job_Mother' => ['en' => 'doctor', 'ar' => 'دكتورة'],
            'Nationality_Mother_ID' => Nationalitie::all()->unique()->random()->id,
            'Blood_Type_Mother_ID' => BloodType::all()->unique()->random()->id,
            'Religion_Mother_ID' => Religion::all()->unique()->random()->id,
            'Address_Mother' => 'القاهرة',
        ]);
    }
}
