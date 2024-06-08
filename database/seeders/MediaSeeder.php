<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate fake data for 20 records
        for ($i = 0; $i < 20; $i++) {
            Media::create([
                'title' => $faker->sentence,
                'description' => $faker->sentence,
                'url' => $faker->url,
                'type' => $faker->randomElement(['video', 'image']),
                'group' => $faker->randomElement(['gallery', 'information', 'profile']),
                'is_active' => $faker->boolean(70) // 70% chance of being true
            ]);
        }
    }
}
