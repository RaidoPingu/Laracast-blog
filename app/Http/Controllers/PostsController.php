<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Category;
use app\Models\Post;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6);

        if (request ('search')) {
            $posts->where('title', 'like', '%' . request ('search', 'category')
                ->orWhere('body', 'like', '%' . request ('search') . '%'));
        }
       return view('posts', [
            'posts' => $posts->get(),
            'categories' => Category::all()
        ]);
    }
}
