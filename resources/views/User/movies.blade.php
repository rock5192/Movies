@extends('layouts.app')

@section('content')
<h1 style="display:flex; align-items: center; justify-content: center; margin-bottom:10px; color:blue
;">My Fav Movies</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Poster</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Release Date</th>
            <th scope="col">Published</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    <img src="{{ asset('/uploads/posters/'.$movies['poster']) }}"
                         alt="poster" style="width:50px;height:50px;border-radius:50%;">
                </td>
                <td>{{ $movies['title'] }}</td>
                <td>{{ $movies['description'] }}</td>
                <td>{{ $movies['release_date'] }}</td>
                @if( $movies['published'] == '1')
                    <td>

                        Pubished
                    </td>
            </tr>

            @else
                <td>
                    Not Published
                </td>

            @endif



        </tbody>

    </table>

@endsection
