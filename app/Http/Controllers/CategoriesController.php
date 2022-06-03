<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function show($slug)
    {
    	$category = Category::where('slug', $slug)->first();
    	if (!is_null($category)) {
    		$books = $category->books()->where('is_approved',1)->get();

    		return view('frontend.pages.books.index', compact('category', 'books'));
    	}
    	return redirect()->route('index');
    }
}
