@extends('layouts.app')

@section('content')

    <div class="header" style="display:flex; justify-content: space-around">
        <a href="{{ route('movies.create') }}">
            <button type="button" class="btn btn-primary" style="margin-left:2px;">Add
                Movies
            </button>
        </a>

        <div class="search" style="display:flex;">
            <form method="post">
                @csrf
                <div class="form" style="display: flex">
                    <div class="keyword" style="margin-right: 10px;">
                        <label>Keyword</label>
                        <input type="text" name="keyword" placeholder="Enter Keyword">
                    </div>

                    <br><br>
                    <div class="from_date" style="margin-right: 10px;">
                        <label>Date From</label>
                        <input type="date" name="datefrom">
                    </div>
                    <br><br>
                    <div class="to_date" style="margin-right:10px;">
                        <label>Date To</label>
                        <input type="date" name="dateto"><br><br>
                    </div>

                    <div class="submit">
                        <input type="submit" value="Apply">

                    </div>
                </div>

            </form>
        </div>

    </div>



    <br>
    <br>
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
        @foreach($movie as $movies)
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

        @endforeach

        </tbody>

    </table>

@endsection
