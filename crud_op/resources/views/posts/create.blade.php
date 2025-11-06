@extends('layouts.app')
@section('title', 'create-post')
@section('content')

    <div class="text-center my-4 ">
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
            Go Back
        </a>
    </div>
    <div>
        <form action="{{ route('posts.store') }}" method="POST" class="p-3">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" >
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" ></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select name="creator" class="form-select" >
                    <option value="" disabled selected>Select creator</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-success">Create Post</button>
        </form>
    </div>

@endsection
