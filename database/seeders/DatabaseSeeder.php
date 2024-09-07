<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\GraduateStandard;
use App\Models\Program;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Faculty::factory(10)->create();
        Program::factory(10)->create();
        GraduateStandard::factory(10)->create();
        Club::factory(10)->create();
        Department::factory(10)->create();
    }
}
