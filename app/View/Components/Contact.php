<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Contact as ContactModel;

class Contact extends Component
{
    public $type;
    public $contact = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;

        if ($type == 'social') {
            $this->contact['social'] = ContactModel::find(1)->social ?? [];
        }

        if ($type == 'email') {
            $this->contact['email'] = ContactModel::find(1)->email ?? '—';
        }

        if ($type == 'phone') {
            $this->contact['phone'] = ContactModel::find(1)->phone ?? '—';
            $this->contact['phone_link'] = preg_replace('/[ \(\)\-]/', '', $this->contact['phone']);
        }

        if ($type == 'address') {
            $this->contact['address'] = ContactModel::find(1)->address ?? '—';
        }

        if ($type == 'map') {
            $this->contact['map'] = ContactModel::find(1)->map ?? '—';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact');
    }
}
