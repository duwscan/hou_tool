<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'file_path' => $this->faker->word(),
            'faculty_id' => Faculty::factory(),
        ];
    }
}
