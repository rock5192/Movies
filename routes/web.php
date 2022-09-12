<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UserMoviesController;
use App\Http\Controllers\UsersController;
use App\Models\Movies;
use App\Models\MoviesUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $movie = Movies::all();
    $fav = MoviesUser::all();
    return view('welcome')->with('movie' , $movie)->with('fav', $fav);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/movies/add',[MoviesController::class,'index'])->name('movies.index');
    Route::get('/movies/create',[MoviesController::class,'create'])->name('movies.create');
    Route::post('/movies/store',[MoviesController::class,'store'])->name('movies.store');
    Route::post('/movies/add',[MoviesController::class,'getData'])->name('movies.index');
    Route::get('/users/index',[UsersController::class,'index'])->name('users.index');
});

Route::middleware('auth')->group(function(){
    Route::get('/my-fav',[UserMoviesController::class,'index'])->name('user.movies');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movies/favourite/{id}',[MoviesController::class,'favourite'])->name('movies.favourite');


