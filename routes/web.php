<?php

use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCommentController;


Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', function(Post $post){
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,

    ]);
})->name('category');

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'storeComment']);

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionController::class, 'create'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
