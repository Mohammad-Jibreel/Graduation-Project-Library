<?php

namespace App\Http\Controllers\Backend;

use App\Admin as AppAdmin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Review;
use App\Models\Translator;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function __construct()
	{
		$this->middleware('auth:admin');
	}

    public function index()
    {
    	$total_books = count(Book::all());
    	$total_authors = count(Author::all());
    	$total_publishers = count(Publisher::all());
    	$total_categories = count(Category::all());
        $total_Translators = count(Translator::all());
        $total_Users = count(User::all());
        $total_Admins = count(AppAdmin::all());
        $total_rating=count(Review::all());


return view('backend.pages.index', compact('total_books', 'total_authors', 'total_publishers', 'total_categories','total_Translators','total_Users','total_Admins','total_rating'));
    }
}
