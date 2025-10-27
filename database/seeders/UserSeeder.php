<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'test1',
            'email' => 'test1@test1',
            'password' => bcrypt('testtest'),
            'role' => 1,
        ]);
        User::create([
            'name' => 'test2',
            'email' => 'test2@test2',
            'password' => bcrypt('testtest'),
            'role' => 0,
        ]);
    }
}
