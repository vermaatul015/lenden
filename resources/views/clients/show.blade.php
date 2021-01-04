@extends('layouts.afterlogintemplate')

@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-new-color">
                    <div class="card-header"><h3 class="card-title">{{trans('setup.details')}}</h3>
                    <div class="card-tools">
                        <a href="{{ route('clients.index') }}" class="" title="{{trans('setup.back')}}" style="">
                            <button class="btn navbar-lightblue btn-sm white-color">
                            {{trans('setup.back')}}</button>
                        </a>
                        <a href="{{ route('clients.edit',[$data['client']->id]) }}" title="{{trans('setup.update_module',['module'=>'Client'])}}" style="">
                            <button class="btn navbar-lightblue btn-sm white-color">
                            {{trans('setup.edit')}}</button>
                        </a>
                        <form method="POST" action="{{ route('clients.show',[$data['client']->id]) }}" accept-charset="UTF-8" style="display:inline;" class="deleteForm">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn navbar-lightblue btn-sm white-color" title="{{trans('setup.delete_module',['module'=>'Client'])}}" onclick="return deleteRecord(this);"> {{trans('setup.delete')}}</button>
                        </form>
                    </div>
                    </div>
                    <div class="card-body ">
                        <div class="box-body">
                            <div class="form-group mb-5">
<div class="row">
<label for="inputEmail3" class="col-sm-3 control-label"> {{ trans('clients.name') }} </label>
<div class="col-sm-9"> {{ $data["client"]->name }} </div>
</div>
</div>
<div class="clearPadding"></div>

<div class="form-group mb-5">
<div class="row">
<label for="inputEmail3" class="col-sm-3 control-label"> {{ trans('clients.is_active') }} </label>
<div class="col-sm-9"> {{ $data["client"]->is_active }} </div>
</div>
</div>
<div class="clearPadding"></div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
