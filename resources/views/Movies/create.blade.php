@extends('layouts.app')

@section('content')

    <div class="card" style="width:50%;margin:auto">
        <div class="card-header"><strong>Add</strong> Movies</div>
        <div class="card-body">
            <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nf-email">Title</label>
                    <input class="form-control" id="title" type="text" name="title" placeholder="Enter Title of Movies."><span class="help-block">Please enter title of the movie</span>
                </div>

                <div class="form-group">
                    <label for="nf-email">Description</label>
                    <input class="form-control" id="description" type="text" name="description" placeholder="Enter Description of Movies."><span class="help-block">Please enter description of the movie</span>
                </div>

                <div class="form-group">
                    <label for="nf-email">Release Date</label>
                    <input class="form-control" id="release_date" type="date" name="release_date" placeholder="Enter Release Date."><span class="help-block">Please enter release date of the movie</span>

                </div>

                <div class="form-group">
                    <label for="nf-email">Poster</label>
                    <input class="form-control" id="poster" type="file" name="poster" placeholder="Select Movie Poster"><span class="help-block">Please choose the poster of the movie</span>

                </div>

                <div class="form-group">
                    <label for="nf-email">Is Published?</label>
                    <select class="form-control" id="poster"  name="published">
                        <option value="1">Published</option>
                        <option value="0">Not Published</option>
                    </select>

                    <span class="help-block">Please select status of movies</span>

                </div>

                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-dot-circle-o"></i> Submit</button>

            </form>
        </div>

    </div>
@endsection
