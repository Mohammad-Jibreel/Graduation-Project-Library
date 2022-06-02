<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Auth\Admin\ForgotPasswordController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Admin\ResetPasswordController;
use App\Http\Controllers\Backend\AuthorsController;
use App\Http\Controllers\Backend\BooksController as BackendBooksController;
use App\Http\Controllers\Backend\CategoriesController as BackendCategoriesController;
use App\Http\Controllers\Backend\PagesController as BackendPagesController;
use App\Http\Controllers\Backend\PublishersController;
use App\Http\Controllers\BackEnd\RatingController as BackEndRatingController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Backend\TranslatorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

Route::get('/', [PagesController::class,'index'])->name('index');

Route::get('/books', [BooksController::class,'index'])->name('books.index');
Route::get('/books/search',[BooksController::class,'search'])->name('books.search');
Route::post('/books/advance-search',[BooksController::class,'advanceSearch'] )->name('books.searched.advance');

Route::get('/books/{slug}',[BooksController::class,'show'] )->name('books.show');
Route::get('/books/upload/new',[BooksController::class,'create'])->name('books.upload');
Route::post('/books/upload/post',[BooksController::class,'store'] )->name('books.store');


Route::get('/books/categories/{slug}',[CategoriesController::class,'show'])->name('categories.show');


Route::group(['prefix' => 'user'], function(){
	Route::get('/profile/{username}',[UsersController::class,'profile'])->name('users.profile');
	Route::get('/profile/{username}/books',[UsersController::class,'books'])->name('users.books');



});

Route::group(['prefix' => 'dashboard'], function(){
	Route::get('/',[DashboardsController::class,'index'])->name('users.dashboard');
	Route::get('/books', [DashboardsController::class,'books'])->name('users.dashboard.books');

	Route::get('/books/edit/{slug}', [DashboardsController::class,'bookEdit'])->name('users.dashboard.books.edit');
	Route::post('/books/update/{slug}',[DashboardsController::class,'bookUpdate'] )->name('users.dashboard.books.update');
	Route::post('/books/delete/{slug}',[DashboardsController::class,'bookDelete'] )->name('users.dashboard.books.delete');

	Route::get('/books/request-list',[DashboardsController::class,'requestBookList'])->name('books.request.list');

	Route::post('/books/request/{slug}',[DashboardsController::class,'requestBook'])->name('books.request');
	Route::post('/books/request-update/{id}',[DashboardsController::class,'requestBookUpdate'])->name('books.request.update');

	Route::post('/books/request-delete/{id}',[DashboardsController::class,'requestBookDelete'])->name('books.request.delete');

	Route::post('/books/request-approve/{id}',[DashboardsController::class,'requestBookApprove'])->name('books.request.approve');
	Route::post('/books/request-reject/{id}',[DashboardsController::class,'requestBookReject'] )->name('books.request.reject');


	// Order Routes
	Route::get('/books/order-list',[DashboardsController::class,'orderBookList'])->name('books.order.list');
	Route::post('/books/order-approve/{id}',[DashboardsController::class,'orderBookApprove'] )->name('books.order.approve');
	Route::post('/books/order-reject/{id}', [DashboardsController::class,'orderBookReject'])->name('books.order.reject');

	// Return
	Route::post('/books/order-return/{id}', [DashboardsController::class,'orderBookReturn'])->name('books.return.store');

	Route::post('/books/order-return-confirm/{id}',[DashboardsController::class,'orderBookReturnConfirm'])->name('books.return.confirm');

});

Route::group(['prefix' => 'admin'], function(){
	Route::get('/',[BackendPagesController::class,'index'])->name('admin.index');



	  // Admin Login Routes
	  Route::get('/login',[LoginController::class,'showLoginForm'] )->name('admin.login');
	  Route::post('/login/submit',[LoginController::class,'login'] )->name('admin.login.submit');
	  Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout');

	  // Password Email Send
	  Route::get('/password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
	  Route::post('/password/resetPost', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.password.email');

	  // Password Reset
	  Route::get('/password/reset/{token}',[ResetPasswordController::class,'showResetForm'])->name('admin.password.reset');
	  Route::post('/password/reset',[ResetPasswordController::class,'reset'])->name('admin.password.reset.post');




	Route::group(['prefix' => 'books'], function(){
		Route::get('/',[BackendBooksController::class,'index'] )->name('admin.books.index');
		Route::get('/unapproved',[BackendBooksController::class,'unapproved'])->name('admin.books.unapproved');
		Route::get('/approved',[BackendBooksController::class,'approved'])->name('admin.books.approved');
		Route::get('/create',[BackendBooksController::class,'create'])->name('admin.books.create');
		Route::get('/edit/{id}',[BackendBooksController::class,'edit'])->name('admin.books.edit');

		Route::post('/store',[BackendBooksController::class,'store'])->name('admin.books.store');
		Route::post('/update/{id}',[BackendBooksController::class,'update'])->name('admin.books.update');
		Route::post('/delete/{id}',[BackendBooksController::class,'destroy'])->name('admin.books.delete');
		Route::post('/approve/{id}',[BackendBooksController::class,'approve'])->name('admin.books.approve');
		Route::post('/unapprove/{id}',[BackendBooksController::class,'unapprove'])->name('admin.books.unapprove');
	});

	Route::group(['prefix' => 'authors'], function(){
		Route::get('/',[AuthorsController::class,'index'])->name('admin.authors.index');
		Route::post('/store',[AuthorsController::class,'store'] )->name('admin.authors.store');
		Route::get('/{id}', [AuthorsController::class,'show'])->name('admin.authors.show');
		Route::post('/update/{id}',[AuthorsController::class,'update'] )->name('admin.authors.update');
		Route::post('/delete/{id}',[AuthorsController::class,'destroy'])->name('admin.authors.delete');
	});

	Route::group(['prefix' => 'categories'], function(){
		Route::get('/',[BackendCategoriesController::class,'index'])->name('admin.categories.index');
		Route::post('/store',[BackendCategoriesController::class,'store'] )->name('admin.categories.store');
		Route::get('/{id}',[BackendCategoriesController::class,'show'])->name('admin.categories.show');
		Route::post('/update/{id}',[BackendCategoriesController::class,'update'])->name('admin.categories.update');
		Route::post('/delete/{id}',[BackendCategoriesController::class,'destroy'] )->name('admin.categories.delete');
	});

	Route::group(['prefix' => 'publishers'], function(){
		Route::get('/',[PublishersController::class,'index'])->name('admin.publishers.index');
		Route::post('/store',[PublishersController::class,'store'])->name('admin.publishers.store');
		Route::get('/{id}', [PublishersController::class,'show'])->name('admin.publishers.show');
		Route::post('/update/{id}',[PublishersController::class,'update'])->name('admin.publishers.update');
		Route::post('/delete/{id}',[PublishersController::class,'destroy'])->name('admin.publishers.delete');

	});
    Route::group(['prefix' => 'Translators'], function(){
		Route::get('/', [TranslatorsController::class,'index'])->name('admin.Translators.index');
		Route::post('/store',[TranslatorsController::class,'store'])->name('admin.Translators.store');
		Route::get('/{id}',[TranslatorsController::class,'show'] )->name('admin.Translators.show');
		Route::post('/update/{id}',[TranslatorsController::class,'update'])->name('admin.Translators.update');
		Route::post('/delete/{id}', [TranslatorsController::class,'destroy'])->name('admin.Translators.delete');
	});

    Route::group(['prefix' => 'user'], function(){
		Route::get('/', [UserController::class,'index'])->name('admin.user.index');
		Route::post('/store',[UserController::class,'store'])->name('admin.user.store');
		Route::get('/{id}',[UserController::class,'show'] )->name('admin.user.show');
		Route::post('/update/{id}',[UserController::class,'update'])->name('admin.user.update');
		Route::post('/delete/{id}', [UserController::class,'destroy'])->name('admin.user.delete');
	});
    Route::group(['prefix' => 'UserAdmin'], function(){
		Route::get('/', [AdminController::class,'index'])->name('admin.UserAdmin.index');
		Route::post('/store',[AdminController::class,'store'])->name('admin.UserAdmin.store');
		Route::get('/{id}',[AdminController::class,'show'] )->name('admin.UserAdmin.show');
		Route::post('/update/{id}',[AdminController::class,'update'])->name('admin.UserAdmin.update');
		Route::post('/delete/{id}', [AdminController::class,'destroy'])->name('admin.UserAdmin.delete');
	});
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::post('add-rating',[RatingController::class,'store'])->name('addRating');
Route::post('update-rating/{id}',[RatingController::class,'update'])->name('updateRating');

Route::get('show-rating',[BackEndRatingController::class,'index'])->name('showRating');
Route::get('rating',[RatingController::class,'show'])->name('Rating');

Route::post('delete-rating/{id}',[BackEndRatingController::class,'destroy'])->name('deleteRating');
Route::get('deleteRating/{id}',[RatingController::class,'destroy'])->name('DeleteRating');

Route::get('show-wish/{book_id}',[WishlistController::class,'store'])->name('wish');
Route::get('wishlist',[WishlistController::class,'index'])->name('wishlistShow');

Route::get('wishlist/delete/{id}',[WishlistController::class,'destroy'])->name('wishlist.delete');
