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
  $(document).ready(function() {
    $(".approve").click(function(event) {
        if( !confirm('هل انت متاكد ؟') ) 
            event.preventDefault();
    });
    $(".denied").click(function(event) {
        if( !confirm('هل انت متاكد ؟') ) 
            event.preventDefault();
    });

});

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
                <th>Client</th>
                  <th>Category</th>
                  <th>Category Brand</th>
                  <th>Car Model</th>
                  <th>Car PLat Number</th>
                  <th>Status</th>
                  <th colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($repairCards as $value)
                <tr>
                <td>{{$value->client->fullName}}</td>
                  <td>{{$value->car->carCatogray->name_en}}</td> 
                  <td>{{$value->car->carCatogray->brand->name_en}}</td>
                  <td>{{$value->car->model}}</td>   
                  <td>{{$value->car->platNo}}</td>    
                  <td>{{$value->status}}</td> 
                  <td><a class="btn btn-primary"href="{{route('reprairCard.edit' ,$value->id)}}"><i class="fas fa-search"></i> EDIT</a></td>
                  <td><a class="btn btn-danger"href="{{route('reprairCard.show' ,$value->id)}}"><i class="fas fa-search"></i> SHOW</a></td>
                  <td><a class="btn btn-warning denied"href="{{route('denied' ,$value->id)}}"><i class="fas fa-search"></i> denied</a></td>
                  <td><a class="btn btn-success approve"href="{{route('approved' ,$value->id)}}"><i class="fas fa-search"></i> Approve</a></td>

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
