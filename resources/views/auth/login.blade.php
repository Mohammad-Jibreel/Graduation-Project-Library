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
                <h2 class="heading-section">Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Have an account?</h3>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                @if (request()->has('callbackUrl'))
                <input type="hidden" name="redirect" value="{{request()->callbackUrl}}">


                @endif

                         <div class="form-group">
                      <input type="text" class="form-control item @error('email') is-invalid @enderror" name="email" required autocomplete="current-password" placeholder="Enter your email" required>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
            <div class="form-group">
              <input id="password-field" type="password" class="form-control item @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" required>

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
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            <div class="form-group">
                <input class="form-check-input item" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label text-white" for="remember">
                    {{ __('Remember Me') }}
                </label>
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
<div style="margin-bottom:170px"></div>

@endsection
