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

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">{{ trans('site.Cartype') }}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    @include('layouts.error')

    <div class="row">
      <div class="col-xs-12">

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">{{ trans('site.Cartype') }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-header">
            <a href="{{route('carType.create')}}" style="margin-top: 10px;" class="btn btn-success">Add Car Type </a>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>{{ trans('site.CarTypeName_en') }}</th>
                  <th>{{ trans('site.CarTypeName') }}</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach($carTypes as $type)
                <tr style=>
                  <td>{{$type->name_ar}}</td>
                  <td>{{$type->name_en}}</td>
                  <td><a href="{{route('carType.edit' ,$type->id)}}" class="btn btn-info">Edit</a></td>
                  <td>

                    <form class="delete" action="{{route('carType.destroy' ,$type->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>

                    </form>
                  </td>

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