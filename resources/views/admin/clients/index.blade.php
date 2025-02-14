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
      {{ trans('site.clientList') }}
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
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->

          <div class="box-body">

            <form action="{{ route('clientSearchIndex')}}" method="GET">

              <div class="form-group">
                <label for="client_name">{{ trans('site.clientName') }}</label>
                <input type="text" name="client_name" value="{{$client_name}}" class="form-control" style="width:500px">
              </div>
              <div class="form-group" style="display: block">
                <label for="client_phone">{{ trans('site.phone') }}</label>
                <input type="text" name="client_phone" value="{{$client_phone}}" class="form-control" style="width:500px">
              </div>

              <input type="submit" class="btn btn-primary" value="{{ trans('site.search') }}">
            </form>
          </div>
        </div>
        <div class="box box-primary">

          <div class="box-header">
            <a href="{{route('client.create')}}" style="margin-top: 10px;" class="btn btn-success"><i class="fa fa-plus" style="margin-right: 10px;" ></i>{{ trans('site.addClient') }} </a>
          </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>{{ trans('site.clientName') }}</th>
                  <th>{{ trans('site.phone') }}</th>
                  <th>{{ trans('site.address') }}</th>
                  <th>{{ trans('site.email') }}</th>
                  <!-- <th>Client Type</th> -->
                  <th>{{ trans('site.edit') }}</th>
                  <th>{{ trans('site.delete') }}</th>
                  <th>{{ trans('site.show') }}</th>
                  <th>{{ trans('site.addCar') }}</th>
                  <th>{{ trans('site.addRepairCar') }}</th>

                </tr>
              </thead>
              <tbody>

                @foreach($clients as $client)
                @if($client->client_type == 'contract')
                <tr>
                  <td>{{$client->fullName}}</td>
                  <td>{{$client->phone}}</td>
                  <td>{{$client->address}}</td>
                  <td>{{$client->email}}</td>
                  <!-- <td>{{$client->client_type}}</td> -->
                  <td><a href="{{route('client.edit' ,$client->id)}}" class="btn btn-info"><i class="fa fa-edit" style="margin-right: 10px;" ></i>{{trans('site.edit')}}</a></td>
                  <td>
                    <form action="{{route('client.destroy' ,$client->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger delete" type="submit"><i class="fa fa-trash-o" style="margin-right: 10px;" ></i>{{trans('site.delete')}}</button>
                    </form>
                  </td>
                  <td><a href="{{route('client.show' ,$client->id)}}" class="btn btn-success"><i class="fa fa-search" style="margin-right: 10px;" ></i>{{ trans('site.show') }}</a></td>
                  <td><a href="{{route('car.createCar' , $client->id)}}" class="btn btn-warning"><i class="fa fa-plus" style="margin-right: 10px;" ></i>{{trans('site.addCar')}}</a></td>
                  <td><a href="{{route('repairCard.createRepairCard' , $client->id)}}" class="btn btn-secondary"><i class="fa fa-plus" style="margin-right: 10px;" ></i>{{trans('site.addRepairCar')}}</a></td>


                </tr>
                @endif
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection