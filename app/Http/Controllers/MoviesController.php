<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoviesController extends Controller
{
    public function index()
    {
        $movie = Movies::all();
        return view('Movies.movies')->with('movie',$movie);

    }

    public function create()
    {
        return view('Movies.create');
    }

    public function store(MovieRequest $request)
    {

        $movies = new Movies;
        $movies->title = $request->title;
        $movies->description = $request->description;
        $movies->release_date = $request->release_date;
        $movies->published = $request->published;

        if($request->hasFile('poster'))
        {
            $file = $request->file('poster');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/posters/',$filename);
            $movies->poster = $filename;
        }

        $movies->save();
        return redirect(route('movies.index'));
    }

    public function favourite($id)
    {

        $user = Auth::user();
        $user->movies()->attach($id);
        return redirect('/');


    }
}
