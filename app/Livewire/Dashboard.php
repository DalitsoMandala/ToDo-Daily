<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TaskCategory;

class Dashboard extends Component
{
    public function render()
    {
        

        return view('livewire.dashboard',[
            'categories' => TaskCategory::all(),
            ]);
    }
}