<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    public function AuthNavController()
{
    $users = Auth::user(); // Assuming you are using the authenticated user
    return view('layouts.navigation', compact('users'));
}
}
