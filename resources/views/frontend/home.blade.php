

@extends('frontend.master')

@section('title', 'Home')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Latest Blog Posts</h1>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ Str::limit($post->content, 100) }}
                    </p>
                    <p class="text-muted">
                        <small>
                            By {{ $post->user->name }} | {{ $post->created_at->format('F d, Y') }}
                        </small>
                    </p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
