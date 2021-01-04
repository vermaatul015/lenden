
@extends('layouts.beforelogintemplate')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{\URL::route('login')}}">{{Config::get('admin_constant.title')}}
        <img src="{{asset('dist/img/logo.png')}}" alt="" title="{{Config::get('admin_constant.title')}}"></a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">@lang('setup.sign_in_to')</p>
        <div class="flash-message"> 
        @include('common.flash_message')
        </div>
        {!! Form::open(array('route' => 'dologin','name' => 'loginForm', 'id' => 'loginForm')) !!}

            <div class="form-group">
                {!! Form::email('email', Cookie::get('user'), array('id' => 'email', 'placeholder' => Lang::get('setup.email'), 'class' => 'form-control login_box','maxlength' => 50,'required'=>'required')) !!}
            </div>
            <div class="form-group">
                {!! Form::input('password', 'password', Cookie::get('pass'), array('id' => 'password', 'placeholder' => Lang::get('setup.password'), 'class' => 'form-control login_box','maxlength' => 15,'data-toggle' => 'password','required'=>'required','minlength'=>'8')) !!}
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                <div class="checkbox icheck">
                    <?php $checked = '';
                    if (Cookie::get('remember') == 1) {
                        $checked = 'checked';
                    }
                    ?>
                    <label><input type="checkbox" name="remember" {{$checked}}> @lang('setup.remember_me')</label>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-12 col-sm-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat login_btn" style="font-size: 15px;">@lang('setup.sign_in')</button>
                </div>
                <!-- /.col -->
            </div>
        {!! Form::close() !!}    
        <a href="#" data-toggle="modal" data-target="#myModal">@lang('setup.i_forgot_my_password')</a><br>
    <a href="{{route('register')}}" class="text-center">@lang('setup.register_a_new_member')</a>
        

    <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-header">
        
        <h3 class="modal-title">@lang('setup.enter_registered_email_id')</h3>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'forgot_password_mail', 'id' => 'forgot_password_form')) !!}
      {!! Form::email('email', null, array('placeholder' => Lang::get('setup.email') ,'class' => 'form-control required','required' => 'required')) !!}
      <div style="padding-top: 20px;">
      <button type="submit" class="btn btn-default">@lang('setup.submit')</button>
      </div>
      {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('setup.close')</button>
      </div>
    </div>

  </div>
</div>
@stop