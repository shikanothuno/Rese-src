<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            "user_id" => 1,
            "shop_id" => 1,
            "comment" => "とてもおいしかったです。",
            "rating" => 4,
        ]);
    }
}
