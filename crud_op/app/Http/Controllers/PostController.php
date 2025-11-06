<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('User')->get();

        return view('posts.index',['posts' => $posts]);
    }
    public function show(Post $post){
        // $single_post = Post::findOrFail( $post);
        // This is route model binding [same dynamic attribute With model name]
        $users = User::all();
        return view('posts.show', ['post' => $post]);
    }
    public function create(){
        $users = User::all();
        $title = request()->title;
        $description = request()->description;

        return view('posts.create',['users' => $users]);
    }

    public function store(){
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $creator = request()->creator;

        Post::create(
            [
                'title' => $title,
                'description' => $description,
                'user_id' => $creator,
                // ازاي السطر دا اتنفذ
                'xyz' => "Ahmed",
            ]
        );
        return to_route('posts.index');
        // return view('posts.index');
    }


    public function edit(Post $post){

        $users = User::all();

        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }
    public function update(Post $post){
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $creator = request()->creator;
        $post->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $creator,
        ]);

        return to_route('posts.show', ['post' => $post]);
    }

    public function destroy(Post $post){
        $post->delete();

        return to_route('posts.index');
    }
}
