
  
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link"  href="{{route('login')}}">
        <img src="{{asset('dist/img/logo.png')}}" alt="" title="{{Config::get('admin_constant.title')}}" style="height: 26px;"></a>
      </li>
      @if(Session::has('user'))
      <li class="nav-item ">
        <a href="{{ Session::has('user') ?  route('clients.index') : '' }}" class="nav-link {{$data['page'] == 'Client'?'active' : ''}}"> Client</a>
      </li> 
      @endif
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      @if(Session::has('user'))
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          
        </a>
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-logout">
        @if(count(\Config::get('common_constant.lang')) > 1)
        {!! Form::open(array('method'=>'get','route' => 'lang.switch','id'=>'langForm')) !!}     
          {{ Form::select('lang', \Config::get('common_constant.lang'), App::getLocale(), ['class' => 'form-control','id'=>'lang']) }}
        {!! Form::close() !!}
        @endif
        <div class="pull-right-logout">
          <a href="{{ route('admin_logout') }}" class="btn btn-default btn-flat" style="background-color:#3c8dbc;color:#fff">
          <i class="fas fa-sign-out-alt"></i> @lang('setup.sign_out')
            <span class="float-right text-muted text-sm"></span>
          </a>
        </div>
          <div class="dropdown-divider"></div>
          
        </div>
        
      </li>
      @endif
    </ul>