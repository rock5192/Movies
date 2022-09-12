<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'release_date', 'poster'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

