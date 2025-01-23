<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class TemplateController extends Controller
{
    public function index(){
        
        return view('frontend.home');
    }

    

    public function info($id)
{
    $post = Post::findOrFail($id); 
    return view('frontend.info', compact('post'));
}


public function addComment(Request $request, $postId)
{
    // Ensure the user is authenticated
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to comment.');
    }

    // Validate the comment content
    $request->validate([
        'content' => 'required|string|max:500',
    ]);

    // Create the comment
    Comment::create([
        'content' => $request->content,
        'postId' => $postId,
        'userId' => auth()->user()->id,  // The currently authenticated user
    ]);

    // Redirect back to the post's info page with a success message
    return redirect()->route('info', ['id' => $postId])->with('success', 'Comment added!');
}
}
