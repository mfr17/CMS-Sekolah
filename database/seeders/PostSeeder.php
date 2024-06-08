<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch all user IDs and category IDs to use for seeding
        $categoryIds = Category::all()->pluck('id')->toArray();

        // Create 20 news items
        for ($i = 0; $i < 20; $i++) {
            Post::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph(50, false),
                'category_id' => $faker->randomElement($categoryIds),
                'thumbnail' => 'https://placehold.co/1000x500',
                'publish_at' => $faker->dateTimeThisYear
            ]);
        }
    }
}
