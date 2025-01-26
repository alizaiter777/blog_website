

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
                                  <a href="category.html">{{ $post->category->name }}</a>
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
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
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
                                  <a href="{{ route('info', ['id' => $post->id]) }}" class="blog-post-action">
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
@endsection




@section('featured')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <article class="featured-post">
            <div class="featured-post-content">
              <div class="featured-post-author">
                <img src="images/author.png" alt="author" />
                <p>By <span>Mary Astor</span></p>
              </div>
              <a href="single-blog.html" class="featured-post-title">
                Every Next Level of Your Life Will Demand
              </a>
              <ul class="featured-post-meta">
                <li>
                  <i class="fa fa-clock-o"></i>
                  October 19, 2020 - 3 min read
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

