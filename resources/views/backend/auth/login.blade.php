@extends('frontend.layouts.app')
<link rel="stylesheet" href="/assets/css/Login.css"/>
<link href="/scss/app.scss'" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@section('content')

<body class="img js-fullheight" style="background-image: url(/assetsfront/img/bg.jpg);">



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Admin Login Page</h2>
                @if (Session::has('login_error'))
                <div class="alert alert-danger">
                  {{ Session::get('login_error') }}
                </div>
              @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
              <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="please enter your email address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="please enter your password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                        <a class="btn btn-link text-success text-bold text-white" href="{{ route('admin.password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
            <div class="form-group">
                <input class="form-check-input item" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label text-white" for="remember">
                    {{ __('Remember Me') }}
                </label>
    </div>
          </form>


                <div class="clearfix"></div>
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
<div style="margin-bottom:170px"></div>

@endsection
