<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(['posts' => PostResource::collection(Post::all())]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:4',
            'user_id' => 'required|exists:users,id'
        ]);
        Post::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $validated['user_id']
        ]);
        return ApiResponse::success([], 'Poste Created Successfully',201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return ApiResponse::success(new PostResource($post));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}