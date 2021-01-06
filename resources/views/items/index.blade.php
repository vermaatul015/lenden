@extends('layouts.afterlogintemplate')

@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            @include('common.flash_message')
                <div class="card card-outline card-new-color">
                    <div class="card-body search-padding">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row fulw">
                                    <div class="col-md-10">
                                        <form method="GET" action="{{ route('items.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                                            <div class="input-group col-md-5">
                                                <input type="text" class="form-control" name="search" placeholder="{{trans('setup.search')}}" value="{{ request('search') }}">
                                            </div>
                                            <div class="input-group col-md-5">
                                            <select name="client" class="form-control" >
                                                <option value="">@lang('setup.select_dropdown',['field'=>'Client'])</option>
                                                @foreach ($data['clients'] as $optionKey => $optionValue)
                                                    <option value="{{ $optionValue->client_id }}" {{ ( request('client') == $optionValue->client_id) ? 'selected' : ''}}>{{$optionValue->client->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <input value="{{trans('setup.search')}}" class="col-md-2 btn btn-secondary navbar-lightblue" type="submit">
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{route('items.index')}}">
                                        <button class="btn btn-secondary navbar-lightblue fulw" >
                                            {{trans('setup.reset')}}
                                        </button></a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-outline card-new-color">
                    <div class="card-body table-responsive p-0">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th><th>@sortablelink("client",trans('items.client'))</th>
<th>@sortablelink("rate",trans('clients.rate'))</th>
<th>@sortablelink("nos",trans('clients.nos'))</th>
<th>@sortablelink("size",trans('clients.size'))</th>
<th>{{trans('setup.actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data['items'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->client->name }}</td>
<td>{{ $item->rate }}</td>
<td>{{ $item->nos }}</td>
<td>{{ $item->size }}</td>

                                        <td>
                                            <a href="{{ route('items.edit',[$item->id]) }}" title="{{trans('setup.update_module',['module'=>'Client'])}}" style="margin-left: 22px;"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                                            <form method="POST" action="{{ route('items.destroy' , [$item->id]) }}" accept-charset="UTF-8" style="display:inline;margin-left: 22px;" class="deleteForm">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" onclick="return deleteRecord(this);" title="{{trans('setup.delete_module',['module'=>'Client'])}}" style="border: 0px;color: #007bff;padding: 0px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $data['items']->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
