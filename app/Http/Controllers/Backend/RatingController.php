<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = Review::orderBy('id', 'desc')->get();

        $user_rating = DB::table('users')
               ->select('users.name', 'users.username')
               ->Join('reviews', 'users.id', '=', 'reviews.user_id')
               ->orderBy('users.id', 'ASC')->distinct()->get();

               $book_rating = DB::table('books')
               ->select('books.title')
               ->Join('reviews', 'books.id', '=', 'reviews.book_id')
               ->orderBy('books.id', 'ASC')->distinct()->get();


        return view('backend.pages.rating.index', compact('rating','user_rating','book_rating'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Review::find($id);
        $rating->delete();
        session()->flash('success', 'rating has been deleted !!');
        return back();
    }
}
