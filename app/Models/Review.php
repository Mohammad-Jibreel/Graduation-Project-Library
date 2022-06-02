<?php

namespace App\Models;

use App\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table="reviews";
    protected $fillable=['book_id','comment','product_rating','user_id','status'];
public function book() {
    return $this->belongsTo(Book::class);
}
}
