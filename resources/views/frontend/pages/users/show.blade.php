@extends('frontend.layouts.app')

@section('content')

<div class="main-content">
<br>
<br>
  <div class="login-area page-area">
    <div class="container">
      <div class="row">
          <div class="col-md-12 p-1">
            <div class="profile-tab border p-2">
                <div class="alert alert-primary" role="alert">
                    Your Profile <a href="#" class="alert-link"></a>
                  </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">User Name</span>
                    </div>
                    <input type="text" class="form-control" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1" value="{{ $user->username }} ">
                  </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"> Name</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon1" value="{{ $user->name }} ">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Email</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value="{{ $user->email }} ">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">phone number</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Phone number" aria-label="phone number" aria-describedby="basic-addon1" value="{{ $user->phone_no }} ">
                  </div>









                  @include('backend.layouts.partials.messages')


              <hr>
              <div class="col-md-8 p-1">
                <div class="profile-tab  p-2">

                  <div class="float-right">
                    <a href="#profileEditModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                  </div>
                  <div class="clearfix"></div>



                  <!-- Profile Edit Modal -->
                  <div class="modal fade" id="profileEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           <form action="{{route('admin.user.update',$user->id)}}" method="POST">
                            @csrf
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" value="{{$user->username}}">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name" value="{{$user->name}}">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">phone number</label>
                                    <input type="text" name="phone_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->phone_no}}">
                                  </div>
                                </div>
                              </div>


                              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Information</button>
                            </form>
                        </div>

              {{-- @include('frontend.pages.books.partials.list')
              <div class="books-pagination mt-5">
                {{ $books->links() }} --}}
              </div>

            </div>
          </div>
      </div>
    </div>
  </div>

</div>
          </div>
      </div>
    </div>
  </div>
</div>
<div style="margin-bottom:300px"></div>
@endsection
