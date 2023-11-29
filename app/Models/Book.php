<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    // use HasFactory;
    protected $fillable = ['title', 'author', 'genre', 'published_at', 'isbn', 'stock'];

    
}
