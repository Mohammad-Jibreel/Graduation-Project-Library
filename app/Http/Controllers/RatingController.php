<?php

namespace App\Http\Controllers;


use App\Models\Review;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
	{
		$this->middleware('auth');
	}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {

        $Review = $request->all();

        Review::create($Review);

        Session::flash('flash_message', 'Task successfully added!');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Review::updateOrCreate([
            'product_rating'=>$request->product_rating,
            'comment'=>$request->comment,
            'book_id'=>$request->book_id,
            'user_id'=>Auth::id(),
            'status'=>1

            ]);
        // Review::updateOrCreate($request->all());



            session()->flash('success', 'book rated successfully');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $rating = auth()->user()->reviews()->with("book")->get();




        return view('frontend.pages.rating.show',compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {


        $task = Review::findOrFail($id);



        $input = $request->all();

        $task->fill($input)->save();





            session()->flash('success', 'book update rating successfully');
            return redirect()->back();

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
