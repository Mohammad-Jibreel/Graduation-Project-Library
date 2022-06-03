@extends('backend.layouts.app')

@section('admin-content')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Manage Users</h1>

      <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"><i class="fas fa-plus-circle fa-sm text-white-50" ></i> Add User</a>
    </div>

    @include('backend.layouts.partials.messages')

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form action="{{ route('admin.user.store') }}" method="post">
              @csrf

              <div class="row">
                <div class="col-md-6">
                  <label for=""> Name</label>
                  <br>
                  <input type="text" class="form-control" name="name" placeholder=" Name">
                </div>
                <div class="col-md-6">
                    <label for="">Username</label>
                    <br>
                    <input type="text" class="form-control" name="username" placeholder="username">
                  </div>
                <div class="col-md-6">
                  <label for="">User email</label>
                  <br>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="col-md-6">
                    <label for="">User password</label>
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="password">
                  </div>
                  <div class="col-md-6">
                    <label for="">User phone number</label>
                    <br>
                    <input type="text" class="form-control" name="phone_no" placeholder="phone number">
                  </div>


              </div>

              <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>

          </div>

        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User  Lists</h6>
            </div>
            <div class="card-body">

              <table class="table" id="dataTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>user name</th>
                    <th>Email</th>
                    <th>phone number</th>

                    <th>account status</th>
                    <th>Manage</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }} </td>
                   <td> {{$user->username}}</td>
                    <td>{{ $user->email }}</td>
                    <th>{{$user->phone_no}}</th>
                    @if ($user->status==0)
                        <td class="badge badge-primary p-2 mt-2"> not verify </td>

                    @elseif ($user->status==1)
                        <td class="badge badge-success p-2 mt-2">  verify </td>


                    @else
                    <td class="badge badge-danger p-2 mt-2">  banned </td>


                    @endif

                    <td>
                      <a href="#editModal{{ $user->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>

                      <a href="#deleteModal{{ $user->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>



                  </tr>


                  <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                            @csrf

                            <div class="row">
                              <div class="col-md-6">
                                <label for="">  Name</label>
                                <br>
                                <input type="text" class="form-control" name="name" placeholder=" Name" value="{{ $user->name }}">
                              </div>

                              <div class="col-md-6">
                                <label for="">Last Name</label>
                                <br>
                                <input type="text" class="form-control" name="username" placeholder="username" value="{{$user->username}}">
                              </div>
                              <div class="col-md-6">
                                <label for="">User email</label>
                                <br>
                                <input type="email" class="form-control" name="email" placeholder="User Email"  value="{{ $user->email }}">
                              </div>


                              <div class="col-md-6">
                                <label for="">phone number</label>
                                <br>

                                <input type="text" class="form-control" name="phone_no" placeholder="phone number"  value="{{$user->phone_no}}">



                        </div>


          {{-- //users.status.update --}}




                            </div>
                            <div class="mt-4">
                              <button type="submit" class="btn btn-primary">Update</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                          </form>

                        </div>

                      </div>
                    </div>
                  </div>


                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
                            @csrf

                            <div>
                              {{ $user->fname , $user->lname }} will be deleted !!
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
