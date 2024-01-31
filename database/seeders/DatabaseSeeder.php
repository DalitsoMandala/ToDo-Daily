<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
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
        $faker = Faker::create();
        TaskCategory::create([
            'name' => 'Gloceries',
            'status' => 0,
            'due_date' => $faker->date('Y-m-d', now()),
        ]);
        TaskCategory::create([
            'name' => 'Education',
            'status' => 0,
            'due_date' => $faker->date('Y-m-d', now()),
        ]);
        TaskCategory::create([
            'name' => 'Last Meeting',
            'status' => 0,
            'due_date' => $faker->date('Y-m-d', now()),
        ]);
        TaskCategory::create([
            'name' => 'Photograpy',
            'status' => 0,
            'due_date' => $faker->date('Y-m-d', now()),
        ]);


        foreach (range(1, 20) as $index) {

            Task::create([
                'name' => $faker->text(30),
                'finished_date' => $faker->date('Y-m-d', now()),
                'user_id' => 1,
                'status' => 'inprogress',
                'task_category_id' => rand(1, 3),

            ]);
        }
    }
}