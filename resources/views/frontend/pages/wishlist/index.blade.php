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
@include('frontend.layouts.partials.messages')
<h1>Wishlist Page</h1>
     @foreach ($wishlist as $item)
     <div class="row">
          <div class="col-md-6">
            <div class="single-book">
              <img src="{{ asset('images/books/'.$item->book->image) }}" alt="" width="200px" height="300px" class="mt-5 p2">
              <div class="book-short-info">
                <h5>{{ $item->book->title }}</h5>
                  <a href="{{ route('books.show', $item->book->slug) }}" class="btn btn-outline-primary"><i class="fa fa-eye"></i> View</a>


                  <a href="{{ route('wishlist.delete', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i> delete</a>

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
