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
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
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
        {{ trans('site.Dashboard') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
              <h3 class="box-title">{{ trans('site.Dashboard') }}</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ trans('site.name_admin') }}</th>
                  <th>{{ trans('site.email_admin') }}</th>
                  <th>{{ trans('site.address') }}</th>
                  <th>{{ trans('site.Actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($clients as $value)
                <tr style=>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->address}}</td>
                  <td><a href="{{route('admin.edit' ,$value->id)}}"><i class="fas fa-edit"></i></a> | <a href=""><i class="fas fa-trash-alt"></i></a> </td>
                </tr>
                @endforeach
                </tbody>
                <!-- <tfoot>
                <tr>

                  <th>{{ trans('site.clientName') }}</th>
                  <th>{{ trans('site.phone') }}</th>
                  <th>{{ trans('site.address') }}</th>
                  <th>{{ trans('site.email') }}</th>
                  <th>{{ trans('site.Actions') }}</th>
                </tr>
                </tfoot> -->
              </table>
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
