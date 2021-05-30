<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    public  $postId,
            $title,
            $description,
            $openModal = false,
            $update = false,
            $paginate = 5,
            $search;

    public function render()
    {
        return view('livewire.posts',[
            'posts' => $this->search === null ?
            Post::latest()->paginate($this->paginate) :
            Post::where('title', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function getModal(){$this->openModal = true;}
    public function hideModal(){$this->openModal = false;
                                $this->update = false;
                                $this->clear();}

    public function validation(){
        $this->validate([
        'title' => 'required|min:5',
        'description' => 'required|min:8|max:100'
        ]);
    }

    public function clear(){
        $this->title = null;
        $this->description = null;
    }
    public function store(){
        $this->validation();

        Post::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        $this->clear();
        $this->hideModal();

        session()->flash('message', 'Data '.$this->title.'was succsesfull create!');
    }

    public function showUpdate($id){
        $this->update = true;
        $this->getModal();

        $data = Post::find($id);
        $this->postId = $data->id;
        $this->title = $data->title;
        $this->description = $data->description;
    }

    public function updateData(){
        $this->validation();
        
        $data = Post::find($this->postId);
        $data->update([
            'title' => $this->title,
            'description' => $this->description
        ]);

        $this->clear();
        $this->hideModal();
        $this->update = false;

        session()->flash('message', 'Data '.$data['title'].' was succsesfull update!');
    }

    public function destroy($id){
        Post::find($id)->delete();
    }
}
