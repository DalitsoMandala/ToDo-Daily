<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\TaskCategory;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditTask extends Component
{
    use LivewireAlert;

    #[Validate('required', onUpdate: false)]
    public $task;

    public $taskId;

    #[Validate('required', onUpdate: true)]
    public $categoryData;


    #[Validate('required', onUpdate: false)]
    public $category;

    public $newCategory;

    #[Validate('required', onUpdate: true)]
    public $dueDate;

    #[Validate('required', onUpdate: false)]
    public $status;

    public $openCategory = false;



    public function save()
    {


        $this->validate();

        try {

            Task::find($this->taskId)->update([
                'name' => $this->task,
                'due_date' => $this->dueDate,
                'user_id' => auth()->user()->id,
                'status' => $this->status,
                'task_category_id' => $this->category

            ]);




            $this->dispatch('saved');
            session()->flash('status', 'Task successfully updated.');
            $this->redirect('/tasks', navigate: true);
        } catch (\Exception $e) {
            $this->alert('error', 'Failed to save!');
            dd($e);
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

    public function chooseCategory($value)
    {
        $this->category = $value;
    }

    public function updatedCategory($data)
    {

        // if (!is_array($data)) {

        //     $this->reset('category');
        // }

        // if (empty($data['value'])) {
        //     $this->reset('category');
        // }
    }

    public function mount(Task $task)
    {


        $this->fill([
            'task' => $task->name,
            'taskId' => $task->id,
            'category' => $task->category->id,
            'dueDate' => $task->due_date,
            'status' => $task->status
        ]);
    }

    public function render()
    {
        $this->categoryData =   TaskCategory::all();
        return view('livewire.edit-task', [
            'taskCategory' => $this->categoryData,
        ]);
    }
}