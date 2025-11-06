@extends('layouts.app')

@section('title')
Posts
@endsection

@section('content')
    {{-- ------------------------========== table =========---------------------------- --}}

    <div class="mt-5 text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-outline-success ">Creat Blog</a>
    </div>

    <div class="mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">description</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created at</th>
                    <th scope="col">updated at</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id  }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->user?->name?? 'Not Found' }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" type="button" class="btn btn-info ">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" type="button" class="btn btn-warning">Edit</a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </body>
@endsection

