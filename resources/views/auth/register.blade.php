@extends('frontend.layouts.app')
<link href="/scss/app.scss'" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/login.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@section('content')

<body class="img js-fullheight" style="background-image: url(/assetsfront/img/bg.jpg);">



    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Register Page</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                   {{$error}}
                                  </div>

                                @endforeach
                            </ul>
                        </div>
                    @endif

                  <h3 class="mb-4 text-center">Don't Have an account?</h3>
                  <form method="POST" action="{{ route('register') }}">
                    @csrf

                             <div class="form-group">
                                <input id="name" type="text" placeholder="please enter your name" class="form-control item @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                      </div>

                      <div class="form-group">
                        <input id="username" type="username" placeholder="please enter your username" class="form-control item @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                        @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="phone no" aria-describedby="emailHelp" placeholder="Enter your phone number" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" id="phone_no">


            @error('phone_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>

                <div class="form-group">
                    <input id="email" type="email" placeholder="please enter your email" class="form-control item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
      </div>



      <div class="form-group ">

        <input id="password" placeholder="please enter your password" type="password" class="form-control item @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group ">

        <input id="password-confirm" placeholder="please enter your password again" type="password" class="form-control item" name="password_confirmation" required autocomplete="new-password">

@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>




                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
       <br>

                            <span class="mr-6">Already have an account ?</span>
<a href="{{ route('login') }}" class="btn btn-primary btn-sm text-center">Login Now</a>


                    </div>

              </form>

              </div>

                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    </section>
    </body>


<div style="margin-bottom:50px"></div>


@endsection
