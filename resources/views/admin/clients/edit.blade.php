@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('script')
<!-- DataTables -->
<script src="https://kit.fontawesome.com/c099210540.js" crossorigin="anonymous"></script>
<script src="{{ asset('FrontEnd') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('FrontEnd') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
@endsection

@section('js')

<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ trans('site.updateContractClient') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('site.home') }}</a></li>
      <li class="active">{{ trans('site.Dashboard') }}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    @include('layouts.error')

    <div class="row">
      <div class="col-xs-12">

        <div class="box box-primary">
          <div class="box-header">
            <!-- <h3 class="box-title">{{ trans('site.Dashboard') }}</h3> -->
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
         
              <div class="box-body">
                <form action="{{ route('client.update' ,$client->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <!-- text input -->
                  <div class="form-group">
                    <label>{{ trans('site.clientName') }}</label>
                    <input type="text" name="fullName" class="form-control" placeholder="{{ trans('site.hintClientName') }}" value="{{$client->fullName}}">
                  </div>
                  <div class="form-group">
                    <label>{{ trans('site.phone') }}</label>
                    <input type="text" name="phone" class="form-control" placeholder="{{ trans('site.hintPhone') }}" value="{{$client->phone}}">
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>{{ trans('site.address') }}</label>
                    <input type="text" name="address" class="form-control" placeholder="{{ trans('site.hintAddress') }}" value="{{$client->address}}">
                  </div>
                  <div class="form-group">
                    <label>{{ trans('site.email') }}</label>
                    <input type="email" name="email" class="form-control" placeholder="{{ trans('site.hintEmail') }}" value="{{$client->email}}">
                  </div>
                  <input type="submit" class="btn btn-primary" value="Update">

                </form>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection