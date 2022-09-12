@extends('layouts.app')

@section('content')



    <br>
    <br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Movies</th>

        </tr>
        </thead>
        <tbody>
        @foreach($user as $users)
            <tr>

                <td>{{ $users['name'] }}</td>
                <td>{{ $users['email'] }}</td>

                @if( $users['role'] == '1')
                    <td>

                        Admin
                    </td>
            </tr>

            @else
                <td>
                    User
                </td>

            @endif

            <td>


                @foreach($users->movies as $movies)

                    {{ $movies->title }}

                @endforeach


            </td>
        @endforeach

        </tbody>

    </table>

@endsection
