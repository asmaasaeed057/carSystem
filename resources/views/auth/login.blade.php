<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <?php $company=App\CompanyDetails::all()->first(); ?>
  <img src = "{{asset('/company_images')}}/{{ $company->company_logo }}" width="50" height="50">
    <a ><b>{{ $company->company_name }}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <p class="login-box-msg">{{ trans('site.login')}}</p>

    <form method="POST" action="{{ route('admin-login') }}">

        @csrf



        <div class="form-group row">

            <label for="email" class="col-sm-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>



            <div class="col-md-12">

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group row">

            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>



            <div class="col-md-12">

                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>



                @if ($errors->has('password'))

                    <span class="invalid-feedback">

                        <strong>{{ $errors->first('password') }}</strong>

                    </span>

                @endif

            </div>

        </div>



        <div class="form-group row">

            <div class="col-md-6">

                <div class="checkbox">

                    <label style="padding-left: 0">

                        <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}

                    </label>

                </div>

            </div>

            <div class="col-md-6 ">

                <button type="submit" class="btn btn-primary" style="    width: 100%;">

                    {{ __('Login') }}

                </button>
            </div>

        </div>



        <div class="form-group row mb-0">

            <div class="col-md-8 offset-md-6">
<!--
                <button type="submit" class="btn btn-primary" style="    width: 100%;">

                    {{ __('Login') }}

                </button> -->
<!--
                <a class="btn btn-link" href="{{ route('password.request') }}">

                    {{ __('Forgot Your Password?') }}

                </a> -->

            </div>

        </div>

    </form>

    <!-- <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('FrontEnd') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('FrontEnd') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ asset('FrontEnd') }}/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
</body>
</html>
