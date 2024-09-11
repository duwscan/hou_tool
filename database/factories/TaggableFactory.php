<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaggableFactory extends Factory
{
    protected $model = Taggable::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'post_id' => Post::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
