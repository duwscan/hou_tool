<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ThreadFactory extends Factory
{
    protected $model = Thread::class;

    public function definition(): array
    {
        return [
            'thread_name' => $this->faker->name(),
            'created_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
