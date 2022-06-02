@extends('frontend.layouts.app')

@section('content')
<style>
    .rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }
</style>
<div class="main-content">
    <br>
<br>
<br>

  <div class="book-show-area">
    <div class="container">
      @include('frontend.layouts.partials.messages')
      <div class="row">

        <div class="col-md-3">

          <img src="{{ asset('images/books/'.$book->image) }}" class="img img-fluid" />
        </div>
        <div class="col-md-9">
          <h3>{{ $book->title }}</h3>
          <p class="text-muted">Written By

            @foreach ($book->authors as $book_author)
              <span class="text-primary">{{ $book_author->author->name }} ,</span>
              @endforeach

             <span class="text-info">{{ $book->category->name }}</span>
          </p>
          <hr>


          <p><strong>Uploaded By: </strong> {{ is_null($book->user) ? "admin who upload the book" : $book->user->name}}</p>


          <p><strong>Uploaded at: </strong> {{ $book->created_at->diffForHumans() }}</p>
          <p>
            <strong>Published at</strong> {{ $book->publish_year }} <br>
            <strong>Publisher: </strong> {{ $book->publisher->name }} <br>
            <strong>ISBN: </strong> {{ $book->isbn }}<br>
            <strong>description: </strong>{!!$book->description!!}





          @if (Auth::check() )



          @if( is_null($review))
          <a class="btn btn-primary" target="_blank" href="{{ asset('b/books/'.$book->bookFile) }}">Download E-book</a>
          <a class="btn btn-primary" target="_blank" href="{{route('chatify')}}/{{$book->user_id}}">Exchange the book from the Chat</a>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Rate the book
</button>

         @elseif ( $review->status==1)
         <a class="btn btn-primary" target="_blank" href="{{ asset('b/books/'.$book->bookFile) }}">Download E-book</a>
         <a class="btn btn-primary" target="_blank" href="{{route('chatify')}}">Exchange the book from the Chat</a><br>

         <p class="alert alert-success mt-5">book already have been rated</p>
         <div class="rating-css text-center mr-auto" style="margin-left:-10px">
            <div class="star-icon">
                @if ($review->product_rating==1)
                <input type="radio" value="1" name="product_rating" checked id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" value="2" name="product_rating" id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" value="3" name="product_rating" id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" value="4" name="product_rating" id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" value="5" name="product_rating" id="rating5">
                <label for="rating5" class="fa fa-star"></label>



                @elseif ($review->product_rating==2)
                    <input type="radio" value="1" name="product_rating"  id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" checked id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                  @elseif($review->product_rating==3)
                  <input type="radio" value="1" name="product_rating"  id="rating1">
                  <label for="rating1" class="fa fa-star"></label>
                  <input type="radio" value="2" name="product_rating"  id="rating2">
                  <label for="rating2" class="fa fa-star"></label>
                  <input type="radio" value="3" name="product_rating" checked id="rating3">
                  <label for="rating3" class="fa fa-star"></label>
                  <input type="radio" value="4" name="product_rating" id="rating4">
                  <label for="rating4" class="fa fa-star"></label>
                  <input type="radio" value="5" name="product_rating" id="rating5">
                  <label for="rating5" class="fa fa-star"></label>
                @elseif ($review->product_rating==4)
                <input type="radio" value="1" name="product_rating"  id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" value="2" name="product_rating"  id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" value="3" name="product_rating"  id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" value="4" name="product_rating" checked id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" value="5" name="product_rating" id="rating5">
                <label for="rating5" class="fa fa-star"></label>
                @else
                <input type="radio" value="1" name="product_rating"  id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" value="2" name="product_rating"  id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" value="3" name="product_rating"  id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" value="4" name="product_rating"  id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" value="5" name="product_rating" checked id="rating5">
                <label for="rating5" class="fa fa-star"></label>
                @endif

            </div>
        </div>










          @endif
          {{-- @endforeach --}}

@else
<button class="btn btn-primary" disabled  target="_blank" href="{{ asset('b/books/'.$book->bookFile) }}">Download E-book</button>
<button class="btn btn-primary" disabled target="_blank" href="{{ route('chatify') }}">Exchange the book from the Chat</button>
<div class="alert alert-warning m-auto mt-4 ">To download the book and exchange books through chat, you must  <a class="font-weight-bold " href="{{route('login')}}?callbackUrl={{route('books.show',$book->slug)
}}">Login</a></div>

          @endif














        </div>

      </div>
    </div>
  </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{ url('add-rating') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rate the {{$book->title}} book</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
            </div>
             </div>
             <div class="col-12">
                <label for="summernote">Book comment</label>
                <br>
                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control" placeholder="Book comment"></textarea>
              </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>


</div>


@endsection
