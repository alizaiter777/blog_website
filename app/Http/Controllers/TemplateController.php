<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

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
}
