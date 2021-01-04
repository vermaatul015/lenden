<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            
        <h1 class="m-0 text-dark">{{isset($data['action']) ? $data['action'] : $data['page']}}
            
        </h1>@if(isset($data['add_new']))
            <a href="{{ $data['add_new'] }}" class="" title="{{Lang::get('setup.add_new_page',['page'=>$data['page']])}}" >
                        <i class="fa fa-plus" aria-hidden="true"></i> @lang('setup.add_new')
                    </a>
            @endif

        </div>
        <div class="col-sm-6">
        @if(Session::has('user'))
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Session::has('user') ?  route('dashboard') : '' }}">@lang('setup.home')</a></li>
            
            @if(isset($data['action']))
            <li class="breadcrumb-item"><a href="{{ Session::has('user') ?  $data['model_url'] : '' }}">{{$data['page']}}</a></li>
            <li class="breadcrumb-item active">{{$data['action']}}</li>
            @else
            <li class="breadcrumb-item active">{{$data['page']}}</li>
            @endif
        </ol>
        @endif
        </div>
    </div>
    </div>
</div>