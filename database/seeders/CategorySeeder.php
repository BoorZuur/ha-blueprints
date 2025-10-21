<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Lights', 'icon' => 'mdi-lightbulb'],
            ['name' => 'Movement', 'icon' => 'mdi-motion-sensor'],
            ['name' => 'Doorbell', 'icon' => 'mdi-doorbell'],
            ['name' => 'Casting', 'icon' => 'mdi-cast'],
            ['name' => 'Climate', 'icon' => 'mdi-thermometer'],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
