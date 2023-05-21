<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Post::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(BloodTypes::class);
        $this->call(ReligionsTable::class);
        $this->call(NationalitiesTable::class);
        $this->call(SpecializationsTable::class);
        $this->call(GendersTable::class);

        $this->call(GradesSeeder::class);
        $this->call(ClassroomsSeeder::class);
        $this->call(SectionsSeeder::class);

        $this->call(User::class);
        $this->call(ParentsSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(TeachersSeeder::class);

        $this->call(SubjectsSeeder::class);

        $this->call(SettingSeeder::class);
    }
}
