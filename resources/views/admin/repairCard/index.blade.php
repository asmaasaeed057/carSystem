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
                <th>{{ trans('site.clientName') }}</th>
                  <th>{{ trans('site.carName') }}</th>
                  <th>{{ trans('site.companyName_en') }}</th>
                  <th>{{ trans('site.model') }}</th>
                  <th>{{ trans('site.plat') }}</th>
                  <th>{{ trans('site.status') }}</th>
                  <th>{{ trans('site.Actions') }}</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($repairCards as $value)
                <tr>
                <td>{{$value->client->fullName}}</td>
                  <td>{{$value->car->carCatogray->name_en}}</td>    <!-- fromCarTable -->
                  <td>{{$value->car->carCatogray->company->name_en}}</td>    <!-- /// -->
                  <td>{{$value->car->model}}</td>    <!-- /// -->
                  <td>{{$value->car->platNo}}</td>    <!-- /// -->
                  <td>{{$value->status}}</td>    <!-- /// -->
                  <td>
                  @if($value->status == "panding")
                  <a href="{{route('approved' ,$value->id)}}" class="btn btn-success" style="margin: 0 5px;">{{ trans('site.aprrove') }} </a>
                  @endif

                  <a href="#"class="btn btn-danger">{{ trans('site.denied') }}</a>
                  </td>
                  <td><a href="{{route('reprairCard.show' ,$value->id)}}"><i class="fas fa-search"></i> </a> | <a href="{{route('reprairCard.edit' ,$value->id)}}"><i class="fas fa-edit"></i></a> </td>
                </tr>
                @endforeach
                </tbody>

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
