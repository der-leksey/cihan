<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\MailForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class Form extends Component
{
    public $phone = '';
    public $email = '';
    public $blured = [];
    
    protected $rules = [
        'phone' => 'required|min:11',
        'email' => 'required|email',
    ];

    public function blur($propertyName)
    {   
        if (!in_array($propertyName, $this->blured)) {
            $this->blured[] = $propertyName;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function submit()
    {
        $this->validate();

        Mail::to('ichbinjura@gmail.com')->send(new MailForm());

        session()->flash('message', 'sucess');

        $this->phone = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.form');
    }
}
