<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class NoteUploader extends Component
{
    use WithFileUploads;
    
    public $state = false;

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $file;

    public function create(){
        $this->validate();
        dd($this->file);
    }

    public function toggle(){
        $this->state = !$this->state;
    }


    public function render()
    {
        return view('livewire.note-uploader',['state'=>$this->state]);
    }
}
