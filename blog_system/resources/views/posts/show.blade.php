@extends('layout.app')

@section('title', $post->title)

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/post-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">
                    <div class="post-heading">
                        <h1 class="mb-3">{{ $post->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article class="mb-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <!-- Post Details -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <p class="fs-5 text-muted mb-4">{{ $post->description }}</p>

                            <hr>

                            <ul class="list-unstyled text-secondary mb-0">
                                <li class="mb-2">
                                    <i class="bi bi-person-circle text-primary me-2"></i>
                                    <strong>Author:</strong> {{ $post->user?->name ?? 'Unknown Author' }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-calendar-event text-success me-2"></i>
                                    <strong>Created at:</strong> {{ $post->created_at->format('M d, Y h:i A') }}
                                </li>
                                <li>
                                    <i class="bi bi-clock-history text-danger me-2"></i>
                                    <strong>Last updated:</strong> {{ $post->updated_at->format('M d, Y h:i A') }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="text-center mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-arrow-left-circle me-1"></i> Back to All Posts
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </article>
@endsection
