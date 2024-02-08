<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class DeleteTask extends Component
{

    public $openModal = false;
    #[Reactive]
    public $data;
    public function modal()
    {

        $this->openModal = !$this->openModal;
    }



    public function mount($data)
    {

        $this->data = $data;
    }

    public function response($data)
    {

    }
    public function render()
    {
        return view('livewire.modals.delete-task');
    }
}
