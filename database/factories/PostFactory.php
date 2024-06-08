<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text(),
            'thumbnail' => "https://placehold.co/1000x500",
            'publish_at' => fake()->dateTimeThisYear(),
            'category_id' => Category::factory(),
        ];
    }
}
