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
                <input type="text" name="title" class="form-control" placeholder="Enter post title" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" rows="4" class="form-control" placeholder="Enter post description"
                    required></textarea>
            </div>

            <!-- Post Creator -->
            <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select name="creator" class="form-select">
                    <option value="" disabled selected>Select creator</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Create</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary px-4">Back</a>
            </div>
        </form>
    </div>
@endsection
