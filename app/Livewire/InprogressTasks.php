<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\TaskCategory;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class InprogressTasks extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $taskChecked = [];
    public $search;

    public function taskAction($action, $values = null, $type = null)
    {

        if ($action === 'delete') {
            if (count($values) === 1) {
                $id = $values[0];
                try {
                    //code...
                    Task::find($id)->delete();

                    session()->flash('status', 'Deleted successfully!');
                    $this->taskChecked = [];
                    $this->dispatch('closeModal');
                } catch (\Throwable $th) {
                    //throw $th;

                    session()->flash('error-message', 'Something went wrong!');
                }
            }

            if (count($values) > 1) {
                $ids = $values;
                try {
                    //code...
                    Task::destroy($ids);

                    session()->flash('status', 'Deleted successfully!');
                    $this->taskChecked = [];
                    $this->dispatch('closeModal');
                } catch (\Throwable $th) {
                    //throw $th;

                    session()->flash('error-message', 'Something went wrong!');
                }
            }
        }

        if ($action === 'archived') {
            if (count($values) === 1) {
                $id = $values[0];
                try {
                    //code...
                    Task::find($id)->update([
                        'archived' => true
                    ]);

                    session()->flash('status', 'Archived successfully!');
                    $this->taskChecked = [];
                    $this->dispatch('closeModal');
                } catch (\Throwable $th) {
                    //throw $th;

                    session()->flash('error-message', 'Something went wrong!');
                }
            }

            if (count($values) > 1) {
                $ids = $values;
                try {
                    //code...
                    Task::whereIn('id', $values)->update([
                        'archived' => true
                    ]);

                    session()->flash('status', 'Archived successfully!');
                    $this->taskChecked = [];
                    $this->dispatch('closeModal');
                } catch (\Throwable $th) {
                        //throw $th;
                    ;
                    session()->flash('error-message', 'Something went wrong!');
                }
            }
        }

        if ($action === 'marked') {

            if (count($values) === 1) {
                $id = $values[0];
                try {
                    //code...
                    Task::find($id)->update([
                        'status' => $type
                    ]);

                    session()->flash('status', 'Marked successfully!');
                    $this->taskChecked = [];
                    $this->dispatch('closeModal');
                } catch (\Throwable $th) {
                    //throw $th;

                    session()->flash('error-message', 'Something went wrong!');
                }
            }

            if (count($values) > 1) {
                $ids = $values;
                try {
                    //code...
                    Task::whereIn('id', $values)->update([
                        'status' => $type
                    ]);

                    session()->flash('status', 'Marked successfully!');
                    $this->taskChecked = [];
                    $this->dispatch('closeModal');
                } catch (\Throwable $th) {
                        //throw $th;
                    ;
                    session()->flash('error-message', 'Something went wrong!');
                }
            }
        }
    }



    public function goPreviousPage()
    {

        $this->previousPage('tasks-page');
    }

    public function goNextPage()
    {

        $this->nextPage('tasks-page');
    }

    public function mount()
    {

        $this->resetPage();
    }
    public function render()
    {
        // $categories = TaskCategory::with('tasks')->get();
        // $tasks = collect();
        // foreach ($categories as $category) {

        //     $tasks[$category->name] = $category->tasks;
        // }

        $tasks = Task::select('tasks.*', 'users.name as user_name')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->join('task_categories', 'task_categories.id', '=', 'tasks.task_category_id')
        ->where(function ($query) {
            $query->where('tasks.name', 'like', '%' . $this->search . '%')
                ->orWhere(DB::raw("DATE_FORMAT(task_categories.due_date, '%e %M, %Y')"), 'like', '%' . $this->search . '%')
                ->orWhere('tasks.status', 'like', '%' . $this->search . '%')
                ->orWhere('users.name', 'like', '%' . $this->search . '%')
                ->orWhere('task_categories.name', 'like', '%' . $this->search . '%');
        })
            ->where('archived', 0)
            ->where('tasks.status', 'inprogress')
            ->orderByDesc('tasks.updated_at')
            ->paginate(5, pageName: 'tasks-page'); // You can adjust the number of items per page (e.g., 10)

        // Load categories for each task
        $tasks->each(function ($task) {
            $task['category'] = TaskCategory::find($task->task_category_id)->name;
        });


        return view('livewire.inprogress-tasks',[
            'tasks' => $tasks
        ]);
    }
}