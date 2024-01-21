<?php

namespace App\Livewire;

use App\Models\TaskCategory;
use Livewire\Component;

class Tasks extends Component
{
    public function render()
    {

        $categories = TaskCategory::with('tasks')->get();
        $tasks = collect();
        foreach ($categories as $category) {

            $tasks[$category->name] = $category->tasks;
        }



        return view('livewire.tasks', [
            'tasks' => $tasks,
        ]);
    }
}
