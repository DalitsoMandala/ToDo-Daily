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

    #[Validate('required', onUpdate: false)]
    public $dueDate;

    #[Validate('required', onUpdate: false)]
    public $status = 'inprogress';

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
            $category = TaskCategory::find($this->category['value']);
            foreach ($this->tasks as $task) {
                $newTask = new Task([
                    'name' => $task['value'],
                    'due_date' => $this->dueDate,
                    'user_id' => auth()->user()->id,
                    'status' => $this->status
                ]);
                $category->tasks()->save($newTask);
            }

            $this->reset();
            $this->dispatch('saved');
            $this->alert('success', 'Saved successfully!');
        } catch (\Exception $e) {
            $this->alert('error', 'Failed to save!');
        }
    }

    public function saveCategory()
    {
        $this->validate([
            'newCategory' => 'required|max:255'
        ]);

        try {
            //code...
            $category =  TaskCategory::create([
                'name' => $this->newCategory,
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

            $this->alert('error', 'Failed to save!');
        }
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
