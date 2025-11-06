@extends('layouts.app')
@section('title', 'update-post')

@section('content')

    <div class="text-center my-4 ">
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
            Go Back
        </a>
    </div>
    <div>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="p-3">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control" >
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description"  class="form-control" rows="4" >{{ $post->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select  name="creator" class="form-select" >
                    <option value=""  disabled selected>Select creator</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected($post->user_id == $user->id)>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">update</button>
        </form>
    </div>

@endsection
