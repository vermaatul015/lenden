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
                                        <form method="GET" action="{{ route('labours.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                                            <div class="input-group col-md-10">
                                                <input type="text" class="form-control" name="search" placeholder="{{trans('setup.search')}}" value="{{ request('search') }}">
                                            </div>
                                            <input value="{{trans('setup.search')}}" class="col-md-2 btn btn-secondary navbar-lightblue" type="submit">
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{route('labours.index')}}">
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
                                        <th>#</th><th>@sortablelink("name",trans('labours.name'))</th>
<th>@sortablelink("is_active",trans('labours.is_active'))</th>
<th>{{trans('setup.actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data['labours'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
<td>{{ $item->is_active }}</td>

                                        <td>
                                            <a href="{{ route('labours.show',[$item->id]) }}" title="{{trans('setup.show_module',['module'=>'Labour'])}}"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                                            <a href="{{ route('labours.edit',[$item->id]) }}" title="{{trans('setup.update_module',['module'=>'Labour'])}}" style="margin-left: 22px;"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                                            <form method="POST" action="{{ route('labours.destroy' , [$item->id]) }}" accept-charset="UTF-8" style="display:inline;margin-left: 22px;" class="deleteForm">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" onclick="return deleteRecord(this);" title="{{trans('setup.delete_module',['module'=>'Labour'])}}" style="border: 0px;color: #007bff;padding: 0px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $data['labours']->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
