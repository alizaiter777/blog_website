<!-- resources/views/profile/profile.blade.php -->
@extends('frontend.master')

@section('content')
    
                <div class="max-w-xl">
                    <h2>{{ Auth::user()->name }}</h2>
                    <!-- Other user information here -->
                    <div style="margin-left: 1000px">
                    <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:text-blue-700" title="Edit Profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                    <a href="{{ route('admin/posts/create') }}" class="text-blue-500 hover:text-blue-700" title="Add Post">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                          </svg>
                    </a>
                </div>
                </div>

    <div class="col-lg-8">
        @if ($posts->isEmpty())
            <p>No posts to display.</p>
        @else
            @foreach ($posts as $post)
                <div class="row mb-4">
                    <div class="col-12">
                        <article class="blog-post">
                            <div class="blog-post-thumb">
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-tag">
                                    <a href="category.html">{{ $post->category->name }}</a>
                                </div>
                                <div class="blog-post-title">
                                    <h4 class="card-text">
                                        {{ $post->title }}
                                    </h4>
                                </div>
                                <div class="blog-post-meta">
                                    <ul>
                                        <small>
                                            By {{ $post->user->name }} | {{ $post->created_at->format('F d, Y') }}
                                        </small>
                                    </ul>
                                </div>
                                <p>{{ Str::limit($post->content, 100) }}</p>
                                <p class="mt-2">
                                    <i class="fas fa-thumbs-up text-success me-1"></i>
                                    <span class="like-count">{{ $post->likes->where('is_like', true)->count() }}</span>
                                    |
                                    <i class="fas fa-thumbs-down text-danger me-1"></i>
                                    <span class="unlike-count">{{ $post->likes->where('is_like', false)->count() }}</span>
                                </p>
                                <a href="{{ route('info', ['id' => $post->id]) }}" class="blog-post-action">
                                    read more <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </article>
                        <div style="margin-left: 800px">
                            <a href="{{ route('profile.delete', ['id' => $post->id]) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif
    </div>
    
@endsection

