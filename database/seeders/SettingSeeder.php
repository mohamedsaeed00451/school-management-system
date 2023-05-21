<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['Key' => 'current_session', 'Value' => '2022-2023'],
            ['Key' => 'school_title', 'Value' => 'MS'],
            ['Key' => 'school_name', 'Value' => 'MS International Schools'],
            ['Key' => 'end_first_term', 'Value' => '01-12-2022'],
            ['Key' => 'end_second_term', 'Value' => '01-03-2023'],
            ['Key' => 'phone', 'Value' => '01092338086'],
            ['Key' => 'address', 'Value' => 'البحيرة'],
            ['Key' => 'school_email', 'Value' => 'info@ms.com'],
            ['Key' => 'logo', 'Value' => 'image.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}
