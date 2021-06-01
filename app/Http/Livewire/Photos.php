<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Photos extends Component
{   
    use WithPagination;
    use WithFileUploads;
    public  $openModal = false,
            $idPhoto,
            $name,
            $file,
            $updateFile,
            $search,
            $paginate = 5,
            $showUpdate = false;
    public function render()
    {
       
        return view('livewire.photos',[
        'photos' => $this->search == null ?
        Photo::latest()->paginate($this->paginate) :
        Photo::where('name', 'like', '%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function getModal(){$this->openModal = true;}
    public function hideModal(){$this->openModal = false;
                                $this->file = false;
                                $this->showUpdate = false;
                                $this->clear();}

    public function validation(){
        $this->validate([
            'name' => 'required|max:30',
            'file' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function clear(){
        $this->name = null;
        $this->file = null;
        $this->updateFile = null;
    }

    public function store(){
        $this->validation();

        $image = $this->file;
        $imageName = $image->storePublicly('images','public');
        Photo::create([
            'name' => $this->name,
            'photoProfile' => $imageName,
        ]);

        $this->clear();
        $this->hideModal();
        session()->flash('message', 'Image succsesfull upload!');
    }

    public function edit($id){
        $this->getModal();
        $this->showUpdate = true;

        $data = Photo::find($id);
        $this->idPhoto = $data->id;
        $this->name = $data->name;
        $this->file = $data->photoProfile;
    }

    public function update(){
        $this->validate([
            'name' => 'required|max:30',
            'updateFile' => 'nullable|image|max:1024', //max 1 mb
        ]);
        
        if($this->updateFile){
            Storage::delete(['public/'.$this->file]);
            $image = $this->updateFile;
            $imageName = $image->storePublicly('images','public');
        }else{$imageName = $this->file;}
        
        $data = Photo::find($this->idPhoto);
        $data->update([
            'name' => $this->name,
            'photoProfile' => $imageName,
        ]);

        $this->clear();
        $this->hideModal();
        session()->flash('message', 'Image succsesfull updated!');
        
    }
    
    public function destroy($id){
        $data = Photo::find($id);
        Storage::delete(['public/'.$data->photoProfile]);
        $data->delete();
    }
}
