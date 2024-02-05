<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\TaskCategory;
use Illuminate\Support\Facades\Crypt;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;

class Dashboard extends Component
{
    use LivewireAlert;
    public $completedCard;

    public $inprogressCard;

    public $ovedueCard;

    public $inP;

    public $inC;

    public $Ovr;




    #[On('move-card')]
    public function moved($status, $order)
    {

        if ($status == 'inprogress') {
            foreach ($order as $column) {
                TaskCategory::find($column)->update([
                    'status' => 0
                ]);
            }
        }

        if ($status == 'completed') {
            foreach ($order as $column) {
                TaskCategory::find($column)->update([
                    'status' => 1
                ]);
            }
        }


        if ($status == 'overdue') {
            foreach ($order as $column) {
                TaskCategory::find($column)->update([
                    'status' => 2
                ]);
            }
        }

        $this->alert('success', 'Updated!');
    }

    public function encryptValue($value)
    {


        $value = Crypt::encrypt($value);
        $this->redirect('/categories/' . $value);
    }

    public function render()
    {
        $inprogressCategories = TaskCategory::with(['tasks' => function ($query) {
            $query->select('id', 'name');
        }])->where('task_categories.status', 0)

            ->withCount([
                'tasks as total_tasks',
                'tasks as completed_tasks' => function ($query) {
                    $query->where('status', '=', 'completed');
                },

            ])

            ->having('total_tasks', '>', 0)
            ->get();



        $completedCategories = TaskCategory::with(['tasks' => function ($query) {
            $query->select('id', 'name');
        }])->where('task_categories.status', 1)

            ->withCount([
                'tasks as total_tasks',
                'tasks as completed_tasks' => function ($query) {
                    $query->where('status', '=', 'completed');
                },

            ])
            ->having('total_tasks', '>', 0)
            ->get();


        $overdueCategories = TaskCategory::with(['tasks' => function ($query) {
            $query->select('id', 'name');
        }])->where('task_categories.status', 2)

            ->withCount([
                'tasks as total_tasks',
                'tasks as completed_tasks' => function ($query) {
                    $query->where('status', '=', 'completed');
                },

            ])
            ->having('total_tasks', '>', 0)
            ->get();


        $totalTasks = Task::count();
        $completedTasks = Task::where('status', 'completed')->count();



        // $this->inP = $inprogressCategories;
        // $this->inC = $completedCategories;
        // $this->Ovr = $ovedueCard

        return view('livewire.dashboard', [
            //  'categories' => TaskCategory::all(),
            'inprogress_categories' => $inprogressCategories,
            'completed_categories' => $completedCategories,
            'overdue_categories' => $overdueCategories,
            'total_tasks' => $totalTasks,
            'completed_tasks' => $completedTasks
        ]);
    }
}
