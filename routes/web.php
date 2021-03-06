<?php

use App\Http\Controllers\PostsController;
// use App\Http\Livewire\UploadController;
use App\Http\Livewire\Photos;
use App\Http\Livewire\Posts;
// use App\Http\Livewire\Student\Index;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('/', function () {
    return view('dashboard');
    });
    Route::get('/posts', Posts::class)->name('posts');
    Route::post('/upload',[PostsController::class,'store']);
    Route::get('/photos', Photos::class)->name('photos');
    Route::get('/input-data', function() { return view('input-data'); });
    Route::get('/tampilan-data', function() { return view('tampilanData'); });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
