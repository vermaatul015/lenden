<div id="notifyMessage">
@if ($flash_message = Session::get('flash-success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $flash_message }}</strong>
</div>
@endif

@if ($flash_message = Session::get('flash-error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $flash_message }}</strong>
</div>
@endif
@if ($flash_message = Session::get('flash-error-single'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $flash_message }}</strong>
</div>
@endif

@if ($flash_message = Session::get('flash-warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $flash_message }}</strong>
</div>
@endif

@if ($flash_message = Session::get('flash-info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $flash_message }}</strong>
</div>
@endif

@if ($flash_message = Session::get('flash-error-list'))
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<ul class="error-list">
		@foreach($flash_message as $key=>$error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

@foreach (['danger', 'warning', 'success', 'info','error','error-list'] as $msg)
    @if(Session::has('alert-' . $msg) && !empty(Session::get('alert-' . $msg)))
	
        <p class="alert alert-{{ $msg }}"><button type="button" class="close" data-dismiss="alert">×</button>	{!! Session::get('alert-' . $msg) !!}
        </p>
    @endif
@endforeach

@if ($errors->any())
<div class="alert alert-danger">
	@if(count($errors->all()) > 0)
	<ul>
		@foreach ($errors->all() as $error)
		    <li>{{ $error }}</li>
		@endforeach
	</ul>
	@else
		<button type="button" class="close" data-dismiss="alert">×</button>	
		Internal server error. Please try again later.
	@endif

</div>
@endif
</div>