<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;
    public $date;
    public $body;
    public $slug;




    public function __construct($title, $slug, $excerpt, $date, $body )
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;

    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts/")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->slug,
                    $document->excerpt,
                    $document->date,
                    $document->body()
                ))
                ->sortByDesc('date');

        });
    }



    public static function find($slug)
    {
       $post= static::all()->firstWhere('slug', $slug);

       if (! $post){
           throw  new ModelNotFoundException();
       }

       return $post;
    }


}
