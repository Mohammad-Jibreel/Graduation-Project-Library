@extends('frontend.layouts.app')

@section('content')
<br>

<div class="main-content">

  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <div class="col-md-8">
            <div class="profile-tab">


              <div class="clearfix"></div>

<h1>Rating Page</h1>
     @foreach ($wishlist_books as $book)
     <div class="row">
          <div class="col-md-6">
            <div class="single-book">
              <div class="book-short-info">

            </div>
            </div>
          </div> <!-- Single Book Item -->
      </div>

     @endforeach


            </div>
          </div>

          <div class="col-md-4 p-1">
            @include('frontend.pages.users.partials.sidebar')

          </div>

      </div>
    </div>
  </div>

</div>
@endsection
