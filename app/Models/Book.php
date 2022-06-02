<?php

namespace App\Models;

use App\Models\BookAuthor;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
// use App\Models\BookTranslator;
use App\Models\Review;
use App\Models\Wishlist;

class Book extends Model

{
    protected $table="books";


    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function publisher()
    {
    	return $this->belongsTo(Publisher::class);
    }

    public function authors()
    {
        return $this->hasMany(BookAuthor::class);
    }
    public function reviews() {
        return $this->hasMany(Review::class);

    }
    public function wishlists() {
        return $this->hasMany(Review::class);

    }


    /**
     * isAuthorSelected
     *
     * @param  integer  $book_id
     * @param  integer  $author_id
     * @return boolean            Return true if the author written the book, false otherwise
     */
    public static function isAuthorSelected($book_id, $author_id)
    {
        $book_author = BookAuthor::where('book_id', $book_id)->where('author_id', $author_id)->first();
        if (!is_null($book_author)) {
            return true;
        }
        return false;
    }

    // public static function isTranslatorSelected($book_id, $translator_id)
    // {
    //     $book_translator = BookTranslator::where('book_id', $book_id)->where('translator_id', $translator_id)->first();
    //     if (!is_null($book_translator)) {
    //         return true;
    //     }
    //     return false;
    // }
}
