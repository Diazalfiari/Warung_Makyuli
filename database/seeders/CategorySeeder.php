<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Groceries',
                'description' => 'Basic food and household items',
            ],
            [
                'name' => 'Snacks',
                'description' => 'Delicious snacks and treats',
            ],
            [
                'name' => 'Beverages',
                'description' => 'Refreshing drinks and beverages',
            ],
            [
                'name' => 'Personal Care',
                'description' => 'Items for personal hygiene and care',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => \Illuminate\Support\Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
