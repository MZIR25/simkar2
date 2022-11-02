<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color: #3b849b;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="border-radius: 100px;">
    <img src="{{asset('template/')}}/dist/img/logo_valtech.png" alt="Valtech Logo" class="img-fluid" style="opacity: .8">
      <p class="login-box-msg">Sign in to start your session</p>

            {{-- @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif --}}
    <form id="quickForm" method="POST" action="{{ route('login') }}">
            @csrf
        <div class="input-group mb-3">
            <label for="exampleInputEmail1"></label>
            <input type="email" name="email" class="form-control
            @error('email')is-invalid
            @enderror" id="exampleInputEmail1" placeholder="Email">
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span><br>
            </div>
            </div>
        @error('email')
        <div class="invalid-feedback">
            <h6><span class="feedback" role="alert">
                <strong>Invalid Login or password.</strong>
            </span></h6></div>
        @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
        <span class="feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <div class="row">
            <div class="col-md-4">
                <a type="submit" href="{{ route('register') }}" class="btn btn-secondary btn-block">Register</a>
                </div>

          <!-- /.col -->
          <div class="col-md-4 offset-md-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
    </form>

      <!-- /.social-auth-links -->
    <!-- /.social-auth-links -->
    <p class="mb-0">
        <a href="{{route('password.request')}}" class="text-center">Forgot my Password</a>
      </p>
    </div>
    {{-- <div class="icheck-primary">
        <input type="checkbox" id="remember">
        <label for="remember">
          Remember Me
        </label>
      </div>
    </div> --}}
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template/')}}/plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="{{asset('template/')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('template/')}}/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/')}}/dist/js/adminlte.min.js"></script>

<script>
$(function () {
$.validator.setDefaults({

});
$('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>




</body>

