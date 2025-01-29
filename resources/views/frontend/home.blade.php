

@extends('frontend.master')


@section('title', 'Home')

@section('content')

<section class="blog">
  <div class="container">
      <div class="row"> <!-- Main row for the two columns -->
          <!-- Blog Posts Column -->
          <div class="col-lg-8">
              @foreach ($posts as $post)
              <div class="row mb-4"> <!-- Add margin-bottom for spacing between posts -->
                  <div class="col-12"> <!-- Full-width within the column -->
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
                              <p>
                                  {{ Str::limit($post->content, 20) }}
                              </p>
                              <p class="mt-2">
                                  <!-- Like Count with Thumbs Up Icon -->
                                  <i class="fas fa-thumbs-up text-success me-1"></i>
                                  <span class="like-count">{{ $post->likes->where('is_like', true)->count() }}</span>
                              
                                  <!-- Separator -->
                                  |
                              
                                  <!-- Unlike Count with Thumbs Down Icon -->
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

          <!-- Trending Posts Column -->
          <div class="col-lg-4">
            <div class="blog-post-widget">
                <div class="latest-widget-title">
                    <h2>Trending Posts</h2>
                </div>
        
                @foreach ($trendingPosts as $trending)
                    <div class="latest-widget">
                        <div class="latest-widget-thum">
                            <a href="{{ route('post.show', $trending->id) }}">
                                <img src="{{ asset('storage/' . $trending->image) }}" class="card-img-top" alt="{{ $trending->title }}">
                            </a>
                            <div class="icon">
                                <a href="{{ route('post.show', $trending->id) }}">
                                    <img src="images/blog/icon.svg" alt="icon" />
                                </a>
                            </div>
                        </div>
                        <div class="latest-widget-content">
                            <div class="content-title">
                                <a href="{{ route('post.show', $trending->id) }}">{{ $trending->title }}</a>
                            </div>
                            <div class="content-meta">
                                <ul>
                                    <li>
                                        <!-- Display Like Count -->
                                        <i class="fas fa-thumbs-up text-success me-1"></i>
                                        <span class="like-count">{{ $trending->like_count }}</span>
                                    </li>
                                </ul>
                                <a href="{{ route('info', ['id' => $trending->id]) }}" class="blog-post-action">
                                    read more <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
        
            </div>
        </div>
        
      </div>
  </div>
</section>
{{ $posts->links('vendor.pagination.default') }}
@endsection






@section('featured')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <article class="featured-post">
            <div class="featured-post-content">
                <div class="featured-post-author d-flex align-items-center">
                    <img 
                      src="images/Blogo.png" 
                      alt="author" 
                      class="rounded-circle border border-dark" 
                      style="width: 100px; height: 100px; object-fit: cover;" 
                    />
                    
                  </div>
                  <p class="ms-3">By <span>Blogge</span></p>
                <h1>Every Next Level of Your Life Will Demand</h1>
                <ul class="featured-post-meta">
                    <li>
                      <i class="fa fa-clock-o"></i>
                     from now
                    </li>
                  </ul>
            </div>
            <div class="featured-post-thumb">
              <img src="https://img.freepik.com/free-vector/hand-drawn-digital-natives-illustration_23-2151197121.jpg"
               alt="feature-post-thumb" />
            </div>
          </article>
        </div>
      </div>
    </div>
@endsection

