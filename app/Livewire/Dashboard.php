<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\TaskCategory;
use Carbon\Carbon;
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


    public $eventTitle;

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

    #[On('show-event')]
    public function showTitle($title, $date, $id)
    {

        $date = Carbon::parse($date)->format('j M, Y');
        $this->dispatch('alpine-show', title: $title, date: $date, status: Task::find($id)->status);
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
            ->where('task_categories.user_id', auth()->user()->id)
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
            ->where('task_categories.user_id', auth()->user()->id)
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
            ->where('task_categories.user_id', auth()->user()->id)
            ->withCount([
                'tasks as total_tasks',
                'tasks as completed_tasks' => function ($query) {
                    $query->where('status', '=', 'completed');
                },

            ])
            ->having('total_tasks', '>', 0)
            ->get();


        $totalTasks = Task::count();
        $completedTasks = Task::where('status', 'completed')->where('tasks.user_id', auth()->user()->id)->count();

        $tasks = Task::where('tasks.user_id', auth()->user()->id)->select('name', 'finished_date as due_date', 'status', 'id')->get();

        $events = [];

        foreach ($tasks as $task) {
            //  id: 1,
            //         title: 'Call with Jane',
            //         start: '2020-11-18',
            //         end: '2020-11-19',
            //         className: 'bg-red'
            $borderColor = '';
            if ($task->status == 'inprogress') {
                $task->status = 'bg-warning';
                $borderColor = '#f0bc74';
            }
            if ($task->status == 'completed') {
                $task->status = 'bg-success';
                $borderColor = '#10b981';
            }
            if ($task->status == 'overdue') {
                $task->status = 'bg-danger';
                $borderColor = '#CA1A41';
            }

            $events[] = [
                'id' => $task->id,
                'title' => $task->name,
                'start' => $task->due_date,
                'className' => $task->status,
                'borderColor' => $borderColor
            ];
        }


        // $this->inP = $inprogressCategories;
        // $this->inC = $completedCategories;
        // $this->Ovr = $ovedueCard

        return view('livewire.dashboard', [
            //  'categories' => TaskCategory::all(),
            'inprogress_categories' => $inprogressCategories,
            'completed_categories' => $completedCategories,
            'overdue_categories' => $overdueCategories,
            'total_tasks' => $totalTasks,
            'completed_tasks' => $completedTasks,
            'events' => $events,
        ]);
    }
}