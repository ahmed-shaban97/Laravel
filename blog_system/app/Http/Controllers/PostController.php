<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->latest()->paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }
    public function about(){
        return view('posts.about');
    }
    public function contact(){
        return view('posts.contact');
    }
    public function post(){
        return view('posts.post');
    }
    public function create(){
        $users = User::all();
        return view('posts.create',['users' => $users]);
    }
    public function store(){
        $title = request()->title;
        $description = request()->description;
        $author = request()->creator;

        Post::create(
            [
                'title' => $title,
                'description' => $description,
                'user_id' => $author
            ]
        );
        return to_route('posts.index');
    }
    public function edit(Post $post){
        $users = User::all();
        return view('posts.edit',['users' => $users, 'post' => $post]);
    }

    public function update(Post $post){
        $title = request()->title;
        $description = request()->description;
        $author = request()->creator;

        $post->update(
            [
                'title' => $title,
                'description' => $description,
                'user_id' => $author
            ]
        );
        return to_route('posts.index');
    }
    public function destroy(Post $post){
        $post->delete();
        return to_route('posts.index');
    }
    public function show(Post $post){
        $users = User::all();
        return view('posts.show',['users' => $users, 'post' => $post]);
    }
}
