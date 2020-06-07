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
<script>
  $(document).ready(function() {
    $(".delete").click(function(event) {
      if (!confirm('هل انت متاكد ؟'))
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
  {{ trans('site.carList') }}
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
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <form action="{{ route('car.carSearch')}}" method="GET">

              <div class="form-group">
                <label for="client_name">{{ trans('site.clientName') }}</label>
                <input type="text" name="client_name" value="{{$client_name}}" class="form-control" style="width:500px">
              </div>
              <input type="submit" class="btn btn-primary" value="{{ trans('site.Search') }}">
            </form>
          </div>

          <br></br>

          <div class="box box-primary">
            <div class="box-header">
              <a href="{{route('car.create')}}" style="margin-top: 10px;" class="btn btn-success"><i class="fa fa-plus" style="margin-right: 10px;" ></i>{{ trans('site.add') }}</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>{{ trans('site.BrandCategory') }}</th>
                  <th>{{ trans('site.model') }}</th>
                  <th>{{ trans('site.Owner') }}</th>
                  <th>{{ trans('site.CarType') }}</th>
                  <th>{{ trans('site.StructureNumber') }}</th>
                  <th>{{ trans('site.PlateNumber') }}</th>
                  <th>{{ trans('site.Color') }}</th>
                  <th>{{ trans('site.Edit') }}</th>
                  <th>{{ trans('site.Delete') }}</th>
                  <!-- <th>Show</th> -->
                </tr>
              </thead>
              <tbody>

                @foreach($cars as $car)
                @if($car->client->client_type == "contract")
                <tr>
                  <td>{{$car->carCategory->name_en}}</td>
                  <td>{{$car->model}}</td>
                  <td>{{$car->client->fullName}}</td>
                  <td>{{$car->carType->name_en}}</td>
                  <td>{{$car->car_structure_number}}</td>
                  <td>{{$car->platNo}}</td>
                  <td>{{$car->car_color}}</td>
                  <td><a href="{{route('car.edit' ,$car->id)}}" class="btn btn-info"><i class="fa fa-edit" style="margin-right: 10px;" ></i>{{ trans('site.Edit') }}</a></td>
                  <td>
                    <form action="{{route('car.destroy' ,$car->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger delete" type="submit"><i class="fa fa-trash-o" style="margin-right: 10px;" ></i>{{ trans('site.Delete') }}</button>

                    </form>
                  </td>
                  <!-- <td><a href="{{route('car.show' ,$car->id)}}" class="btn btn-success">Show</a></td> -->

                </tr>
                @endif
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