@extends('layout.app')

@section('title', 'Create Post')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Create New Post</h2>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter post title">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" rows="4" class="form-control" placeholder="Enter post description"></textarea>
            </div>

            <!-- Post Creator -->
            <div class="mb-3">
                <label class="form-label fw-bold">Post Creator</label>
                <div class="p-2 bg-light border rounded">
                    {{ Auth::user()->name }}
                </div>
                <input type="hidden" name="creator" value="{{ Auth::user()->id }}">
            </div>


            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Create</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary px-4">Back</a>
            </div>
        </form>
    </div>
@endsection
