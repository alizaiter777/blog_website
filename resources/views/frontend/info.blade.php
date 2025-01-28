@extends('frontend.master')

@section('title', 'Info Page')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-50">
  <div class="max-w-4xl w-full bg-white p-6 rounded-lg shadow-md">
      <!-- Tag -->
      <a href="#" class="inline-block bg-black text-white text-xs uppercase px-3 py-1 rounded-full mb-4">{{ $post->category->name }}</a>
      
      <!-- Title -->
      <h1 class="text-4xl font-bold text-gray-800 leading-tight mb-4 ">
        {{ $post->title }}
      </h1>
      
      <!-- Meta Information -->
      <ul class="flex space-x-3 text-sm text-gray-500 mb-6">
          <ul>By <a href="#" class="text-gray-800 font-semibold">{{ $post->user->name }}</a></ul>
          <ul><i class="fa fa-clock-o"></i>  {{ $post->created_at->format('F d, Y') }}</ul>
         
      </ul>
      
      <!-- Image -->
      <div class="rounded-lg overflow-hidden mb-6">
          <img  src="{{ asset('storage/' . $post->image) }}" alt="Surfing" class="w-full">
      </div>
      
      <!-- Content -->
      
      
    
  </div>
  <div class="container" style="max-width: 1000px;">
    <p class="text-muted" style="word-wrap: break-word;">
        {{ $post->content }}
    </p>
</div>






    <!-- Like  -->

    <div class="d-flex align-items-center gap-2">
      <!-- Like Button -->
      <button 
          class="btn {{ $post->likes->where('user_id', auth()->id())->isNotEmpty() && $post->likes->where('user_id', auth()->id())->first()->is_like ? 'btn-success' : 'btn-outline-success' }} like-btn" 
          style="padding: 0.25rem 0.5rem; border-radius: 20px; font-size: 0.875rem;" 
          data-url="{{ route('post.like', $post->id) }}">
          <i class="fas fa-thumbs-up me-1"></i> Like
      </button>
  
      <!-- Unlike Button -->
      <button 
          class="btn {{ $post->likes->where('user_id', auth()->id())->isNotEmpty() && !$post->likes->where('user_id', auth()->id())->first()->is_like ? 'btn-danger' : 'btn-outline-danger' }} unlike-btn" 
          style="padding: 0.25rem 0.5rem; border-radius: 20px; font-size: 0.875rem;" 
          data-url="{{ route('post.unlike', $post->id) }}">
          <i class="fas fa-thumbs-down me-1"></i> Unlike
      </button>
  </div>
  <div class="col-md-4 ms-auto">

<ul class="main-nav-social">
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post.show', $post->id)) }}" target="_blank"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
            <a href="https://x.com/intent/tweet?url={{ urlencode(route('post.show', $post->id)) }}&text={{ $post->title }}" target="_blank"><i class="fa fa-twitter"></i></a>
        </li>
        <p>{{ $post->shares }} Shares</p>
      </ul>
      

  </div>
       
  
  <!-- Display like and unlike counts -->
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
  




     <!-- Comments Section -->


    <div class="comments-section mt-6">
        <h3 class="text-xl font-semibold mb-4">Comments</h3>
        
        <!-- Display comments -->
        @foreach($post->comments as $comment)
            <div class="comment mb-4 p-4 border border-gray-200 rounded-lg">
                <p><strong>{{ $comment->user->name }}</strong> </p>
                <p>{{ $comment->content }}</p>
                <small class="text-gray-500">{{ $comment->created_at->format('F d, Y') }}</small>
            </div>
        @endforeach

        <!-- Comment Form -->
        <form method="POST" action="{{ route('addComment', $post->id) }}">
            @csrf
            <textarea name="content" placeholder="Add your comment..." class="w-full p-3 border border-gray-300 rounded-md" required></textarea>
            <button type="submit" class="mt-2 bg-white text-black py-2 px-4 rounded">post</button>
        </form>
    </div>
    </div>
</div>

@endsection
