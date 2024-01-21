<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\TaskCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'phone' => '+265997496637',
            'password' => Hash::make('password')
        ]);

        TaskCategory::create([
            'name' => 'Gloceries',
        ]);
        TaskCategory::create([
            'name' => 'Education',
        ]);
        TaskCategory::create([
            'name' => 'Last Meeting',
        ]);
        TaskCategory::create([
            'name' => 'Photograpy',
        ]);
    }
}
