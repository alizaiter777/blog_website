<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function index(){
    $users=User::orderBy('id','asc')->get();
    $total=User::count();

     return view('admin.users.home',compact(['users','total']));
   }

   public function create(){
    return view('admin.users.create');
  }

   public function save(Request $request){
     
    $validation=$request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
        'password_confirmation'=>'required',
  
     ]);
     $data =User::create($validation);
     if($data){
        session()->flash('success','User Add Successfully');
        return redirect(route('admin/users'));
     }
     else{
        session()->flash('error','Some problem occure');
        return redirect(route('admin.users/create'));
     }

     
}
    
public function delete($id){
    $users=User::findOrFail($id)->delete();
    if($users){
        session()->flash('success','User Deleted Successfully');
        return redirect(route('admin/users'));

    }
    else{
        session()->flash('error','User Not Delete Successfully');
        return redirect(route('admin/users'));
    }
}
}






