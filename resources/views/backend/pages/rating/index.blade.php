@extends('backend.layouts.app')

@section('admin-content')
<style>
    .rating-css div {
    color: #ffe400;
    font-size: 10px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 5px 0;
    margin-left:-100px;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 20px;
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
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Manage Rating</h1>

    </div>

    @include('backend.layouts.partials.messages')

    <div class="row">
      <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rating List</h6>
            </div>
            <div class="card-body">

              <table class="table" id="dataTable">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name  </th>
                    <th>User Name</th>
                    <th>Book Rating</th>

                    <th>Book Name</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rating as $rate)
                  <tr>
         <td>{{$rate->id}}</td>
                @foreach ($user_rating as $ur)
      <td> {{$ur->name}} </td>
<td>{{$ur->username}}</td>
                @endforeach









               <td>
                <div class="rating-css text-center">
                    <div class="star-icon">
                        @if ($rate->product_rating==1)
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



                        @elseif ($rate->product_rating==2)
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
                          @elseif($rate->product_rating==3)
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
                        @elseif ($rate->product_rating==4)
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
                        <input type="radio" value="4" name="product_rating" checked id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                        @endif

                    </div>
                </div>
               </td>


                @foreach ($book_rating as $br)
                <td>{{$br->title}}</td>
               @endforeach

                    <td> {{ $rate->comment }} </td>
                     <td> <a href="#deleteModal{{ $rate->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>
                    </td>


                  </tr>


                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $rate->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('deleteRating', $rate->id) }}" method="post">
                                @csrf

                            <div>
                              {{-- {{ $rate->title }} will be deleted !! --}}
                            </div>

                            <div class="mt-4">
                              <button type="submit" class="btn btn-primary">Ok, Confirm</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                          </form>

                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- Delete Modal -->
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>


@endsection
