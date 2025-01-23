@extends('frontend.master')

@section('title', 'Info Page')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-50">
  <div class="max-w-4xl w-full bg-white p-6 rounded-lg shadow-md">
      <!-- Tag -->
      <a href="#" class="inline-block bg-black text-white text-xs uppercase px-3 py-1 rounded-full mb-4">Travel</a>
      
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
      <p class="text-gray-700 leading-relaxed">
        {{ $post->content }}      </p>
  </div>


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
                <button type="submit" class="mt-2 bg-black text-black py-2 px-4 rounded">post</button>
            </form>
        </div>
    </div>
</div>

@endsection
