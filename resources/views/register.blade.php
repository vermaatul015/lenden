
@extends('layouts.beforelogintemplate')

@section('content')

<div class="login-box">
  <div class="login-logo">
  <a href="{{\URL::route('login')}}">{{Config::get('admin_constant.title')}}
  <img src="{{asset('dist/img/logo.png')}}" alt="" title="{{Config::get('admin_constant.title')}}"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">@lang('setup.register')</p>
    <div class="flash-message"> 
        @include('common.flash_message')
        </div>
    {!! Form::open(array('route' => 'register','id'=>'register_form')) !!}
    <div class="form-group ">
        {!! Form::text('name', null,array('placeholder' => Lang::get('setup.name') ,'class' => 'form-control required','required' => 'required')) !!}
        
      </div>
      <div class="form-group ">
        {!! Form::email('email', null,array('placeholder' => Lang::get('setup.email') ,'class' => 'form-control required','required' => 'required')) !!}
        
      </div>
      <div class="form-group ">
        {!! Form::password('password',  array('class' => 'form-control required','placeholder'=>Lang::get('setup.password'),'required' => 'required','minlength'=>'8')) !!}
        
      </div>
      <div class="form-group ">
        {!! Form::password('password_confirmation',  array('class' => 'form-control required','placeholder'=>Lang::get('setup.confirm_password'),'required' => 'required','minlength'=>'8')) !!}
        
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12 col-sm-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('setup.register')</button>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}
    <!-- /.social-auth-links -->

    <a href="{{route('login')}}" class="text-center">@lang('setup.sign_in')</a>

  </div>
  <!-- /.login-box-body -->
</div>
@stop