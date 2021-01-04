<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{Config::get('admin_constant.title')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
</head>
<body class="hold-transition login-page login_panel">
<div class="lang-section">
  @if(count(\Config::get('common_constant.lang')) > 1)
    {!! Form::open(array('method'=>'get','route' => 'lang.switch','id'=>'langForm')) !!}     
      {{ Form::select('lang', \Config::get('common_constant.lang'), App::getLocale(), ['class' => 'form-control','id'=>'lang']) }}
    {!! Form::close() !!}
    @endif
  </div>
@yield('content')

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script>
    window.translations = {!! Cache::get('translations') !!};
</script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('dist/js/jquery-validator-text.js')}}"></script>

<script>
  $(function () {
    $( "#lang" ).change(function() {
      $("#langForm").submit();
    });
  });
  $("#register_form").validate();
  $("#loginForm").validate();
  $("#forgot_password_form").validate();
  $("#reset_password_form").validate();
</script>
</body>
</html>