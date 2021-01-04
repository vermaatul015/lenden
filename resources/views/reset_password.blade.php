
@extends('layouts.beforelogintemplate')

@section('content')
<div class="login-box">
  <div class="login-logo">
  <a href="{{\URL::route('login')}}">{{Config::get('admin_constant.title')}}
  <img src="{{asset('dist/img/logo.png')}}" alt="" title="{{Config::get('admin_constant.title')}}"></a>
  </div>


  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">@lang('setup.change_password')</p>
    <div class="flash-message"> 
        @include('common.flash_message')
        </div>
    {!! Form::open(array('id'=>'reset_password_form')) !!}
      <div class="form-group ">
        {!! Form::password('password',  array('class' => 'form-control required','placeholder'=>Lang::get('setup.password'),'required' => 'required','minlength'=>'8')) !!}
        
      </div>
      <div class="form-group ">
        {!! Form::password('password_confirmation',  array('class' => 'form-control required','placeholder'=>Lang::get('setup.confirm_password'),'required' => 'required','minlength'=>'8')) !!}
        
      </div>
      <div class="row" style="margin-left:0px">
        <!-- /.col -->
        <div class="col-xs-12 col-sm-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('setup.submit')</button>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop