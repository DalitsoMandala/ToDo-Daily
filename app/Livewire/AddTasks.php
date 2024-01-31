<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\TaskCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PhpParser\Node\Stmt\TryCatch;

class AddTasks extends Component
{
    use LivewireAlert;

    #[Validate('required', onUpdate: false)]
    public $tasks = array();

    #[Validate('required', onUpdate: false)]
    public $categoryData;


    #[Validate('required', onUpdate: false)]
    public $category;

    public $newCategory;


    public $dueDate;



    public $openCategory = false;




    public function addTask($task)
    {
        $this->tasks[] = $task;
    }

    public function deleteTask($taskId)
    {
        $idToDelete = $taskId;

        // Use array_filter to filter out the element with the specified ID
        $data = array_filter($this->tasks, function ($item) use ($idToDelete) {
            return $item['id'] === $idToDelete;
        });

        $arrayKey = key($data);
        //remove the element from the array
        unset($this->tasks[$arrayKey]);
    }
    public function save()
    {

        $this->validate();

        try {
            $category = TaskCategory::find($this->category);
            foreach ($this->tasks as $task) {
                $newTask = new Task([
                    'name' => $task['value'],
                    'user_id' => auth()->user()->id,

                ]);


                $category->save();
                $category->tasks()->save($newTask);
            }


            $this->dispatch('saved');
            session()->flash('status', 'Task(s) saved successfully!');

            $this->redirect('/tasks', navigate: true);
        } catch (\Exception $e) {

            session()->flash('error-message', 'Failed to save!');
        }
    }

    public function saveCategory()
    {
        $this->validate([
            'newCategory' => 'required|max:255',
            'dueDate' => 'required|date',

        ]);

        try {
            //code...
            $category =  TaskCategory::create([
                'name' => $this->newCategory,
                'due_date' =>  $this->dueDate
            ]);


            $this->alert('success', 'New category saved successfully!');
            $this->openCategory = false;
            $this->reset('newCategory');
            $this->dispatch(
                'category-added',
                id: $category->id,
                name: $category->name
            );
        } catch (\Throwable $th) {
            dd($th);
            $this->alert('error', 'Failed to save!');
        }
    }

    public function chooseCategory($value)
    {
        $this->category = $value;
    }


    public function mount()
    {
    }

    #[Layout('layouts.app')]
    public function render()
    {

        $this->categoryData =   TaskCategory::all();

        return view('livewire.add-tasks', [
            'taskCategory' => $this->categoryData,
        ]);
    }
}