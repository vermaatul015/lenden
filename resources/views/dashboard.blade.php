@extends('layouts.afterlogintemplate')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              
              <!-- Message div -->
              <div style="clear:both;margin-top:10px;"></div>
                 @include('common.flash_message')
              </div>
              </div>
            <!-- small box -->
            <div class="box-body">
            @lang('setup.welcome')
          </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
