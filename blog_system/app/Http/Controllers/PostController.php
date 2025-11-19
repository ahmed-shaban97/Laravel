<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:10',
            'creator' => 'required|exists:users,id'
        ]);

        Post::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $validated['creator']
        ]);

        return to_route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post){
        $users = User::all();
        return view('posts.edit',['users' => $users, 'post' => $post]);
    }

    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:10',
            'creator' => 'required|exists:users,id'
        ]);

        $post->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' =>  Auth::user()->id//$validated['creator'] لو كتبت الكومنت دا هيعمل مشكله فالسيكيورتي )(الانسبكت )
        ]);

        return to_route('posts.index')->with('info', 'Post updated successfully!');
    }

    public function destroy(Post $post){
        $post->delete();
        return to_route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function show(Post $post){
        return view('posts.show',['post' => $post]);
    }
}
