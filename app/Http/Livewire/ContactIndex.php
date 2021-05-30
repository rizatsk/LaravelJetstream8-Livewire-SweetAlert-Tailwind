<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
    public $statusUpdate = false;
    public $paginate = 5;
    public $search;
    protected $listeners = ['contactStored' => 'handleStored' ,'contactUpdate' => 'handleUpdate' ];
    protected $updateQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => $this->search === null ?
            Contact::latest()->paginate($this->paginate):
            Contact::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('phone', 'like', '%'.$this->search.'%')->paginate($this->paginate)

        ]);
    }

    public function getContact($id){
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id){
        if($id){
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message', 'Contatcs Berhasil DiHapus!');
        }
    }

    public function handleStored($contacts){
        session()->flash('message', 'Contatcs '.$contacts['name'].' Berhasil Disimpan!');
    }

    public function handleUpdate($contacts){
        // $this->handleStored($contacts);
        session()->flash('message', 'Contatcs '.$contacts['name'].' Berhasil Diupdate!');
    }
}
