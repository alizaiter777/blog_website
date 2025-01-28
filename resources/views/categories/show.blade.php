@extends('frontend.master')
@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        
        @if ($posts->count() > 0)
        <div class="col-lg-8">
            @foreach ($posts as $post)
            <div class="row mb-4"> 
                <div class="col-12">
                    <article class="blog-post">
                        <div class="blog-post-thumb">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                        </div>
                        <div class="blog-post-content">
                            <div class="blog-post-tag">
                              @if ($post->category)
                                  <a href="{{ route('categories.show', $post->category->id) }}" class="btn btn-primary btn-sm">
                                      {{ $post->category->name }}
                                  </a>
                              @endif
                            </div>
                            <div class="blog-post-title">
                                <p class="card-text">
                                    {{ $post->title }}
                                </p>
                            </div>
                            <div class="blog-post-meta">
                                <ul>
                                    <small>
                                        By {{ $post->user->name }} | {{ $post->created_at->format('F d, Y') }}
                                    </small>
                                </ul>
                            </div>
                            <p>
                                {{ Str::limit($post->content, 100) }}
                            </p>
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
                </div>
            </div>
            @endforeach
        </div>

            {{ $posts->links('vendor.pagination.default') }}

        @else
            <p>No posts found in this category.</p>
        @endif
    </div>
@endsection
