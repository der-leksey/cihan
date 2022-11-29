<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $input = 'empty';
 
    public function input()
    {
        //$this->input;
    }
 
    public function render()
    {
        return view('livewire.form');
    }
}
