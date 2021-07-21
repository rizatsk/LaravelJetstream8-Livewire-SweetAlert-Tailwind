<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UploadController extends Component
{
    public $file;
    public function upload(){
        if($this->file){
            $file = $this->file;
            $fileName = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;
            $file->storeAs('file/'.$folder, $fileName , 'public');
       }
    }
    // public function render()
    // {
    //     return view('livewire.upload-controller');
    // }
}
