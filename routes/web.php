<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;


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

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
