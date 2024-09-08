<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\ThreadMessage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ThreadMessageFactory extends Factory
{
    protected $model = ThreadMessage::class;

    public function definition(): array
    {
        return [
            'sender' => $this->faker->randomElement(['user', 'bot']),
            'timestamp' => Carbon::now(),
            'message' => $this->faker->word(),
            'thread_id' => Thread::factory(),
        ];
    }
}
