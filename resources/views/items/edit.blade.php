@extends('layouts.afterlogintemplate')

@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-new-color">
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('items.update' ,[$data['items']->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="crud_generator_form">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('items.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
