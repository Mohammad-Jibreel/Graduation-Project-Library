<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\Translator;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();
        return view('backend.pages.books.index', compact('books'));
    }

    public function unapproved()
    {
        $books = Book::orderBy('id', 'desc')->where('is_approved', 0)->get();
        $approved = false;
        return view('backend.pages.books.index', compact('books', 'approved'));
    }

    public function approved()
    {
        $books = Book::orderBy('id', 'desc')->where('is_approved', 1)->get();
        $approved = true;
        return view('backend.pages.books.index', compact('books', 'approved'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $translators = Translator::all();

        $books = Book::where('is_approved', 1)->get();
        return view('backend.pages.books.create', compact('categories', 'publishers', 'authors', 'books','translators'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:50',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'slug' => 'nullable|unique:books',
            'description' => 'nullable',
            'image' => 'required|image|max:2048',
            'bookFile' => 'nullable|File|max:20480',
            'isbn'=>'required|max:10:unique:isbn,10',
            // 'quantity' => 'nullabel|min:1'
        ],
        [
            'title.required' => 'Please give book title',
            'image.max' => 'Image size can not be greater than 2MB',
            'bookFile'=>'File size can not be greater than 20MB',
            'isbn.max'=>'isbn must be 10 unique number '


        ]);

        $book = new Book();
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
        $book->is_approved = 1;
        $book->isbn = $request->isbn;
        $book->translator_id = 1;
        // $book->quantity = 1;
        $book->save();

        // Image Upload
        if ($request->image) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'-'.$book->id.'.'.$ext;
            $path = "images/books";
            $file->move($path, $name);
            $book->image = $name;
            $book->save();
        }

        if ($request->bookFile) {
            $file = $request->file('bookFile');
            $ext = $file->getClientOriginalExtension();
            $name = time().'-'.$book->id.'.'.$ext;
            $path = "b/books";
            $file->move($path, $name);
            $book->bookFile = $name;
            $book->save();
        }

        // Book Authors
        foreach ($request->author_ids as $id) {
            $book_author = new BookAuthor();
            $book_author->book_id = $book->id;
            $book_author->author_id = $id;
            $book_author->save();
        }


        session()->flash('success', 'The book has been uploaded to the admin for review and approval !!');
        return redirect()->route('admin.books.index');
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
        $book = Book::find($id);

        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $books = Book::where('is_approved', 1)->where('id', '!=', $id)->get();

        $translators=Translator::all();

        return view('backend.pages.books.edit', compact('categories', 'publishers', 'authors', 'books', 'book','translators'));
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

       $book = Book::find($id);
       $request->validate([
            'title' => 'required|max:50',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'slug' => 'nullable|unique:books,slug,'.$book->id,
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
            // 'quantity' => 'nullable|numeric|min:1',
            'BookFile'=>'nullable|File|max:20048',
        ],
        [
            'title.required' => 'Please give book title',
            'image.max' => 'Image size can not be greater than 2MB',
            'BookFile.max' => 'File size can not be greater than 20MB'
        ]);


        $book->title = $request->title;
        if (empty($request->slug)) {
            $book->slug = str::slug($request->title);
        }else{
            $book->slug = $request->slug;
        }

        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->publish_year = $request->publish_year;
        $book->description = $request->description;
        $book->isbn = $request->isbn;
        // $book->quantity = 1;
        $book->translator_id = 1;
        // $book->quantity = 1;
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

        if ($request->bookFile) {

            // Delete Old Image
            if (!is_null($book->bookFile)) {
                $file_path = "b/books/".$book->bookFile;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            $file = $request->file('bookFile');
            $ext = $file->getClientOriginalExtension();
            $name = time().'-'.$book->id.'.'.$ext;
            $path = "b/books";
            $file->move($path, $name);
            $book->bookFile = $name;
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


        session()->flash('success', 'Book has been update !!');
        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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

            if (!is_null($book->bookFile)) {
                $file_path = "b/books/".$book->bookFile;
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

    public function approve($id)
    {
        // Delete all child categories
        $book = Book::find($id);
        if (!is_null($book)) {
            $book->is_approved = 1;
            $book->save();
        }

        session()->flash('success', 'Book has been approved !!');
        return back();
    }

    public function unapprove($id)
    {
        // Delete all child categories
        $book = Book::find($id);
        if (!is_null($book)) {
            $book->is_approved = 0;
            $book->save();
        }

        session()->flash('success', 'Book has been unapproved !!');
        return back();
    }
}
