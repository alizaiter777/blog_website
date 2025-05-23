<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; 
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::with(['user', 'category'])->orderBy('id', 'asc')->get();
        $total = Post::count();
    
        return view('admin.posts.home', compact(['posts', 'total']));
    }

    public function create()
    {
        // Retrieve all categories
        $categories = Category::all(); 
        return view('admin.posts.create', compact('categories'));
    }
    
    public function save(Request $request)
    {
        // Validate the request
        $validation = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoryId' => 'required|exists:categories,id', 
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('uploads/posts', 'public'); // Store in the `storage/app/public/uploads/posts` directory
            $validation['image'] = $filePath; // Save the file path
        }

        // Automatically set the `userId` based on the logged-in user
        $validation['userId'] = auth()->id();
    
        // Create the post
        $data = Post::create($validation);
    
        // Handle the response
        if ($data) {
            session()->flash('success', 'Post Added Successfully');
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.posts'); // Redirect to admin posts
            } else {
                return redirect()->route('profile.show'); // Redirect to profile page
            }
        } else {
            session()->flash('error', 'Some Problem Occurred');
            return redirect(route('admin/posts/create')); // Correct route format
        }
    }

    public function edit($id){
        $posts = Post::findOrFail($id); 
        $categories = Category::all(); 
    
        return view('admin.posts.update', compact('posts', 'categories'));
    }

    public function update(Request $request, $id)
{
    $posts = Post::findOrFail($id);

    // Use the request to update the fields
    $posts->title = $request->input('title');
    $posts->content = $request->input('content');
    $posts->image = $request->input('image'); // Adjust this if handling file uploads
    $posts->categoryId = $request->input('categoryId');

    $data = $posts->save();

    if ($data) {
        session()->flash('success', 'Post Updated Successfully');
        return redirect(route('admin/posts'));
    } else {
        session()->flash('error', 'Some problem occurred');
        return redirect()->back();
    }
}

public function delete($id){
    $posts=Post::findOrFail($id)->delete();
    if($posts){
        session()->flash('success','Post Deleted Successfully');
        return redirect(route('admin/posts'));

    }
    else{
        session()->flash('error','Post Not Delete Successfully');
        return redirect(route('admin/posts'));
    }
}

public function showPostsToFront()
{
    // Fetch posts with their related user and category
    $posts = Post::with(['user', 'category'])->orderBy('id', 'desc')->paginate(6);

    $trendingPosts = Post::with(['likes' => function ($query) {
        $query->where('is_like', true);
    }])
        ->withCount(['likes as like_count' => function ($query) {
            $query->where('is_like', true);
        }])
        ->orderBy('like_count', 'desc') // Sort by highest is_like count
        ->limit(3) // Only take the top 5
        ->get();

    return view('frontend.home', compact('posts', 'trendingPosts'));
}

public function like(Post $post)
{
    $post->likes()->updateOrCreate(
        ['user_id' => auth()->id()],
        ['is_like' => true]
    );

    return response()->json(['message' => 'Liked successfully', 
    'like_count' => $post->likes->where('is_like', true)->count(), 
    'unlike_count' => $post->likes->where('is_like', false)->count()]);
}

public function unlike(Post $post)
{
    $post->likes()->updateOrCreate(
        ['user_id' => auth()->id()],
        ['is_like' => false]
    );

    return response()->json(['message' => 'Unliked successfully', 
    'like_count' => $post->likes->where('is_like', true)->count(), 
    'unlike_count' => $post->likes->where('is_like', false)->count()]);
}


public function search(Request $request)
{
    $search = $request->input('search');

    $posts = Post::with(['category', 'user'])
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->orWhereHas('category', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })
        ->orWhereHas('user', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })
        ->orderBy('id', 'desc') 
        ->paginate(5); 

    $trendingPosts = Post::with(['likes' => function ($query) {
        $query->where('is_like', true);
    }])
        ->withCount(['likes as like_count' => function ($query) {
            $query->where('is_like', true);
        }])
        ->orderBy('like_count', 'desc') 
        ->limit(3)
        ->get();

    return view('frontend.home', compact('posts', 'trendingPosts'));
}

public function share($id)
{
    $post = Post::findOrFail($id);

    // Increment the shares count
    $post->increment('shares');

    return redirect()->route('post.show', $id)->with('message', 'Post shared successfully!');
}




}
