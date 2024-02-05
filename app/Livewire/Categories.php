<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\TaskCategory;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Crypt;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Categories extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $name;

    #[Validate('required|date')]
    public $dueDate;

    #[Validate('required')]
    public $status;

    public $rowId;

    public $searchedCategory;

    #[On('editCategoryModal')]
    public function set($rowId)
    {

        $this->rowId = $rowId;
    }

    #[On('deleteCategoryModal')]
    public function remove($rowId)
    {

        $this->rowId = $rowId;
    }

    public function save()
    {

        $this->validate();

        try {
            if ($this->status == 'inprogress') {
                $this->status = 0;
            } else if ($this->status == 'completed') {
                $this->status = 1;
            } else {
                $this->status = 2;
            }


            $category = TaskCategory::find($this->rowId);
            $category->name = $this->name;
            $category->due_date = $this->dueDate;
            $category->status = $this->status;
            $category->save();
            $this->alert('success', 'Updated category successfully!');
            $this->dispatch('saved');
        } catch (\Throwable $e) {
            $this->alert('error', 'Updated category failed. Something went wrong!');
        }
    }

    public function delete()
    {
        try {
            TaskCategory::find($this->rowId)->delete();
            $this->alert('success', 'Delete category successfully!');
            $this->dispatch('saved');
        } catch (\Throwable $e) {
            $this->alert('error', 'Delete failed. Something went wrong!');
        }
    }

    public function mount($name = null)


    {
        if ($name !== null) {

            $this->searchedCategory = Crypt::decrypt($name);


        }else{
            $this->searchedCategory = '';
        }
    }
    public function render()
    {
        return view('livewire.categories');
    }
}