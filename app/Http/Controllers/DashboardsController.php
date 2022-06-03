<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;
use App\Models\BookAuthor;
use App\Models\Author;
use App\Models\BookRequest;
use App\Models\ChMessage;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class DashboardsController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$user = Auth::user();
        $total_wishlist=count(Wishlist::where('user_id',Auth::id())->get());
        $total_approve=count(Book::where('is_approved', 1)->where('id',Auth::id())->get());
        $total_unapprove=count(Book::where('is_approved', 0)->where('id',Auth::id())->get());

        $total_rating =count(User::with('reviews')->get()); //here

    	if (!is_null($user)) {
    		return view('frontend.pages.users.dashboard', compact('user','total_wishlist','total_rating','total_approve','total_unapprove'));
    	}
    	return redirect()->route('index');
    }

   public function books()
    {
    	$user = Auth::user();

    	if (!is_null($user)) {
            $books = $user->books->all();
    		return view('frontend.pages.users.dashboard_books', compact('user', 'books'));
    	}
    	return redirect()->route('index');
    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookEdit($slug)
    {
        $book = Book::where('slug', $slug)->first();

        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $books = Book::where('is_approved', 1)->where('slug', '!=', $slug)->get();
        return view('frontend.pages.users.edit_book', compact('categories', 'publishers', 'authors', 'books', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookUpdate(Request $request, $slug)
    {
       $book = Book::where('slug', $slug)->first();

       $request->validate([
            'title' => 'required|max:50',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'slug' => 'nullable|unique:books,slug,'.$book->id,
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ],
        [
            'title.required' => 'Please give book title',
            'image.max' => 'Image size can not be greater than 2MB'
        ]);


        $book->title = $request->title;
        if (empty($request->slug)) {
            $book->slug = Str::slug($request->title);
        }else{
            $book->slug = $request->slug;
        }

        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->publish_year = $request->publish_year;
        $book->description = $request->description;
        $book->user_id = Auth::id();
        $book->is_approved = 0;
        $book->isbn = $request->isbn;
        $book->quantity = 1;
        $book->translator_id = 1;
        $book->save();

        // Image Upload
        if ($request->image) {

            // Delete Old Image
            if (!is_null($book->image)) {
                $file_path = "images/books/".$book->image;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'-'.$book->id.'.'.$ext;
            $path = "images/books";
            $file->move($path, $name);
            $book->image = $name;
            $book->save();
        }

        // Book Authors

        // Delete old authors table data
        $book_authors = BookAuthor::where('book_id', $book->id)->get();
        foreach ($book_authors as $author) {
            $author->delete();
        }

        foreach ($request->author_ids as $id) {
            $book_author = new BookAuthor();
            $book_author->book_id = $book->id;
            $book_author->author_id = $id;
            $book_author->save();
        }

        session()->flash('success', 'The book has been updated and has been sent to the admin for review and approval of the update!!');
        return redirect()->route('users.dashboard.books');
    }


















    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookDelete($id)
    {
        // Delete all child categories
        $book = Book::find($id);
        if (!is_null($book)) {
            // Delete Old Image
            if (!is_null($book->image)) {
                $file_path = "images/books/".$book->image;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            $book_authors = BookAuthor::where('book_id', $book->id)->get();
            foreach ($book_authors as $author) {
                $author->delete();
            }

            $book->delete();
        }


        session()->flash('success', 'Book has been deleted !!');
        return back();
    }



}
