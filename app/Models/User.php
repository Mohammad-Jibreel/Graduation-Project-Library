<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Review;
use App\Models\Wishlist;

class User extends Authenticatable implements MustVerifyEmail

{
    use Notifiable;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'phone_no', 'address', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
public function reviews() {
   return $this->hasMany(Review::class);

}



 public function wishlists() {
    return $this->hasMany(Wishlist::class,'user_id');

 }




    public function books()
    {
        return $this->hasMany(Book::class);
    }


}
