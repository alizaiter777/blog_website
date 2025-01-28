<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::orderBy('id','desc')->get();
        $total=Category::count();
    
         return view('admin.categories.home',compact(['categories','total']));
       }

       public function create(){
        return view('admin.categories.create');
      }
    
       public function save(Request $request){
         
        $validation=$request->validate([
            'name'=>'required',
            
      
         ]);
         $data =Category::create($validation);
         if($data){
            session()->flash('success','Category Added Successfully');
            return redirect(route('admin/categories'));
         }
         else{
            session()->flash('error','Some problem occure');
            return redirect(route('admin.categories/create'));
         }
    
         
    }
    
    public function delete($id){
        $categories=Category::findOrFail($id)->delete();
        if($categories){
            session()->flash('success','Category Deleted Successfully');
            return redirect(route('admin/categories'));
    
        }
        else{
            session()->flash('error','Category Not Delete Successfully');
            return redirect(route('admin/categories'));
        }
    }

    public function edit($id){
        $categories=Category::findOrFail($id);
        return view('admin.categories.update',compact('categories'));
    }

    public function update(Request $request, $id){
        $categories=Category::findOrFail($id);
        $name = $request->name;

        $categories->name=$name;
        $data=$categories->save();
        if($data){
            session()->flash('success','Category Update Successfully');
            return redirect(route('admin/categories'));
        } 
        else{
            session()->flash('error','Some problem occure');
            return redirect(route('admin/categories/update'));
        }
    }

    public function show($id)
{
    // Fetch the category or throw a 404 if not found
    $category = Category::findOrFail($id);

    // Get all posts belonging to this category and order by id
    $posts = Post::where('categoryId', $id)->orderBy('id', 'desc')->paginate(5); // Adjust pagination as needed

    return view('categories.show', compact('category', 'posts'));
}

}

