@extends('layouts.app')

@section('title')
product-details
@endsection

@section('content')
    {{-- ------------------------========== post details =========---------------------------- --}}
    <div class="card mt-5">
        <div class="card-header">post info</div>
        <div class="card-body">
            <h5 class="card-title">Title: {{ $post->title }}</h5>
            <p class="card-text">Description: {{ $post->description }}</p>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">post creator info</div>
        <div class="card-body">
            <h5 class="card-title">Email: {{ $post->user->email??'NOt Found' }}</h5>
            <p class="card-text">Updated At: {{ $post->updated_at }}</p>
            <p class="card-text">Created At: {{ $post->created_at }}</p>
        </div>
    </div>



    </body>
@endsection

