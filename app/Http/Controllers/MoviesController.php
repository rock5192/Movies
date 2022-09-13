<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $data=['You have successfully selected the favourites'];
        $users['to'] = 'saujanya93@gmail.com';
        Mail::send('mail',$data,function($messages) use ($users){
            $messages->to('saujanya93@gmail.com');
            $messages->subject('You have selected the favourite');
        });
        return redirect('/');


    }

    public function getData(Request $request)
    {
        $searchTerm = $request->keyword;
        $dateFrom = $request->datefrom;
        $dateTo = $request->dateto;


        $movie = Movies::where('title', 'LIKE', "%{$searchTerm}%")->whereBetween('release_date',[$dateFrom." 00:00:00",$dateTo." 23:59:59"])->get();

        return view('Movies.movies')->with('movie',$movie);
    }
}
