<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TaskCategory;
use Livewire\Component;

class SearchComponent extends Component
{
    public $data = [];
    public function render()
    {

        $pages  =  [
            'Dashboard' => route('dashboard'),
            'Tasks' => route('tasks'),
            'Add tasks' => route('add-task'),
            'Inprogress tasks' => route('inprogress-tasks'),
            'Completed tasks' => route('completed-tasks'),
            'Overdue tasks' => route('overdue-tasks'),
            'Categories' => route('categories'),
            'Settings' => route('settings'),
        ];

        $tasks =  Task::pluck('name', 'id')->toArray();
        $categories = TaskCategory::pluck('name')->toArray();

        $this->data = [
            'pages' => $pages,
            'tasks' => $tasks,
            'categories' => $categories,
        ];


        return view('livewire.search-component');
    }
}