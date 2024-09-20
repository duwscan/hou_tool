<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\GraduateStandard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GraduateStandardFactory extends Factory
{
    protected $model = GraduateStandard::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'file_path' => $this->faker->word(),
            'faculty_id' => Faculty::factory(),
        ];
    }
}
