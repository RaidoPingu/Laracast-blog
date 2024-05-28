<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Category;
use app\Models\Post;
use Illuminate\Validation\Rule;

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

    public function create()
    {


        return view('posts.create');
    }

    public function store()
    {



       $attributes =  request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category' => ['required', Rule::exists('categories', 'id')],

        ]);

       $attributes['user_id'] = auth()->id();
       $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
       Post::create($attributes);


        return redirect('/');

    }
}
