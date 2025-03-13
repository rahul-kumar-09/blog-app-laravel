<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::all();
    // $posts = Post::where('user_id', auth()->id())->get();
    // $posts = auth()->user()->UserAllPosts()->latest()->get();
    // $posts = [];
    // if(auth()->check()) {
    //     $posts = auth()->user()->UserAllPosts()->latest()->get();
    // }
    return view('layout', ['posts' => $posts]);
});



Route::post('/register', [UserController::class, 'register']);  
Route::post('/logout', [UserController::class, 'logout']);  
Route::post('/login', [UserController::class, 'login']);  


Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);


Route::get('/create-post', function () {
    return view('createpost');
});


Route::get('/profile', function () {
    return view('profile');
});

Route::get('/home', function () {
    $posts = Post::all();

    return view('home', ['posts' => $posts]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});