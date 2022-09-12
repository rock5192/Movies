<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMoviesController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $movies = Auth::user()->movies->first();
        return view('User.movies')->with('movies', $movies);
    }
}
