<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailForm;
use App\Services\Settings;

class Form extends Component
{
    public $email = '';
    
    protected $rules = [
        'phone' => 'required|min:11',
        'email' => 'required|email',
    ];

    function __construct()
    {
        $this->phone = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function submit()
    {
        $this->validate();

        $maildata = [
            'phone' => $this->phone,
            'email' => $this->email,
        ];

        Mail::to('ichbinjura@gmail.com')->send(new MailForm($maildata));

        session()->flash('message', 'sucess');

        $this->phone = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.form', ['settings' => Settings::getSettings()->toArray()]);
    }
}
