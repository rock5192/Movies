@extends('layouts.app')


@section('content')
    <h1 style="color:red;display:flex;align-items: center;justify-content: center; margin-bottom:10px; z-index:1;">
        MOVIES </h1>
    <div class="movies" style="display:flex; justify-content:space-evenly;">

        @foreach($movie as $movies)

            @if($movies['published'] == '1')

                <div class="card" style="width: 18rem; box-shadow: 10px 5px">
                    <img src="{{ asset('/uploads/posters/'.$movies['poster']) }}"
                         class="card-img-top" alt="poster" height="300px; width:300px;">
                    <div class="card-body">
                        <h5 class="card-title">{{$movies['title']}}</h5>
                        <p class="card-text">{{ $movies['description'] }}</p>
                        <p class="card-text">{{ $movies['release_date'] }}</p>


                        <p style="color:red;">No. of
                            Likes: {{ $fav->where('movies_id',$movies['id'])->count() }}</p>

                        @if(Auth::user())
                            <a href="{{ route('movies.favourite',['id' => $movies['id']]) }}"
                               class="btn btn-primary">Favourite</a>




                        @endif
                    </div>
                </div>
            @endif



        @endforeach
    </div>
@endsection
