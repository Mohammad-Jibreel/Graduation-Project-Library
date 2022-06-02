@extends('frontend.layouts.app')

@section('content')
<br>
<br>
<style>
    .rating-css div {
    color: #ffe400;
    font-size: 25px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 5px 0;
    margin-left:-60px;

  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 25px;
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

  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <h1>Rating Page</h1>
          <div class="col-md-8">
            <div class="profile-tab">
                @include('frontend.layouts.partials.messages')
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Comment</th>
                        <th scope="col" colspan="2">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($rating as $item)

                      <tr>
                        <th scope="row">{{$item->id}}</th>

                <td>{{$item->book->title}}</td>



                        <td>
                            <div class="rating-css text-center mr-auto" style="margin-left:-10px">
                                <div class="star-icon">



                                     @for ($i=1; $i<=5;$i++)

          <input type="radio" value="{{$i}}" name="product_rating" {{$i <=$item->product_rating ? "checked" : '' }} id="rating-{{$i}}">
                                     <label for="rating-{{$i}}" class="fa fa-star"></label>


                                     @endfor





                                </div>
                            </div>
                           </td>
                        <td>{{$item->comment}}</td>
                      <td><a  class="btn btn-danger" href="{{route('DeleteRating',$item->id)}}" class="fa fa-trash">Delete</a></td>




                      </tr>

            @endforeach






                  </table>


              <div class="clearfix"></div>



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
