<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name,
           $phone;
    
    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store(){

        $this->validate([
            'name' => 'required|min:5',
            'phone' => 'required|max:15'
        ]);

        $contacts = Contact::create([
            'name'=>$this->name,
            'phone'=>$this->phone
        ]);
        $this->resetInput();

        $this->emit('contactStored', $contacts);
    }

    private function resetInput(){
        $this->name = null;
        $this->phone = null;
    }
}
