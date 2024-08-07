<?php

namespace App\Http\Controllers\Api;

//import model Post
use App\Models\Post;

use App\Http\Controllers\Controller;

//import resource PostResource
use App\Http\Resources\PostResource;

class PostController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $posts = Post::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }
}