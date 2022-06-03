<?php

namespace App\Models;

use App\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
protected $fillable=['book_id','user_id'];



    use HasFactory;
    public function book() {
        return $this->belongsTo(Book::class,'book_id');
    }

/**
 * Get the user that owns the Wishlist
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    return $this->belongsTo(User::class,'user_id');
}

}
