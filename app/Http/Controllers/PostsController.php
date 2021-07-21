<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request){
        if($request->hasFile(key: 'file')){
            $file = $request->file(key:'file');
            $fileName = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;    
            $file->storeAs('file/'.$folder, $fileName , 'public');

            return $folder;
       }
       return '';
    }
}
