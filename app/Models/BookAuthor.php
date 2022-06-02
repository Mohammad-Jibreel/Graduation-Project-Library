<?php

namespace App\Models;
use App\Models\Book;
use App\Models\Author;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function author()
    {
    	return $this->belongsTo(Author::class);
    }

}
