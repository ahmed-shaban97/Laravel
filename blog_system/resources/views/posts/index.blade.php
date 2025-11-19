@extends('layout.app')

@section('title', 'Blog')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/home-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <!-- Create Button -->
                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('posts.create') }}" class="btn btn-success text-uppercase px-4">
                        + Create New Post
                    </a>
                </div>

                <!-- Posts List -->
                @foreach ($posts as $post)
                    <div class="post-preview border rounded-3 p-4 mb-4 shadow-sm bg-white position-relative">
                        <h2 class="post-title mb-2">{{  Str::words($post->title, 3) }}</h2>
                        {{-- الحته اللي جايه دي اتعلمتها من ال AI  --}}
                        <p class="post-subtitle text-muted mb-3">{{ Str::limit($post->description, 100) }}</p>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2 mb-2">
                            <!-- Show -->
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye-fill me-1"></i> Show
                            </a>

                            <!-- Edit -->
                            @can('update', $post)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            @endcan


                            <!-- Delete -->
                            @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this post?')"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash3-fill me-1"></i> Delete
                                </button>
                            </form>
                            @endcan
                        </div>

                        <div class="d-flex justify-content-between align-items-center text-muted small border-top pt-3">
                            <span>
                                <i class="bi bi-person-circle me-1 text-primary"></i>
                                <strong>{{ $post->user?->name ?? 'Unknown Author' }}</strong>
                            </span>
                            <span>
                                <i class="bi bi-calendar-event me-1 text-danger"></i>
                                {{ $post->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>

                @if ($posts->isEmpty())
                    <div class="alert alert-info text-center">No posts yet. Create your first post!</div>
                @endif
            </div>
        </div>
    </div>
@endsection
