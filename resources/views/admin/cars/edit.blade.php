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
<style>
  select {
    width: 200px;
  }
</style>
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
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Update Client</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form action="{{ route('car.update',$car->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{__('site.clientName')}}</label>
                        <select class="form-control select2" name="client_id" style="width: 100%;">
                          @foreach($clients as $client)
                          <option value="{{$client->id}}" {{$client->id == $car->client_id ? "selected":""}}>{{$client->fullName}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{__('site.carCat')}}</label>
                        <select class="form-control select2" name="car_brand_category_id" id="carCat" style="width: 100%;">
                          @foreach($carCategories as $category)
                          <option value="{{ $category->id }}" {{($category->id == $car->car_brand_category_id) ? 'selected' : '' }}>
                            {{ $category->name_ar }}
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{__('site.Cartype')}}</label>
                        <select class="form-control select2" name="carType_id" id="CarType" style="width: 100%;">
                          @foreach($carTypes as $type)
                          <option value="{{$type->id}}" {{$type->id == $car->carType_id ? "selected":""}}>{{$type->name_ar}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{__('site.model')}}</label>
                        <select class="form-control select2" name="model" style="width: 100%;">
                          @for($i=2025;$i>=1980;$i--)
                          <option value="{{$car->model}}" {{$car->model == $i ? "selected" : ""}}> {{$i}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{__('site.plat')}}</label>
                        <input class="form-control " type="text" name="platNo" id="" value="{{$car->platNo}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Structure Number</label>
                        <input class="form-control " type="text" name="car_structure_number" id="" value="{{$car->car_structure_number}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Color</label>
                        <input class="form-control " type="text" name="car_color" id="" value="{{$car->car_color}}">
                      </div>
                    </div>


                  </div>
              </div>


              <input type="submit" class="btn  btn-info " value="Update">
              </form>
            </div>
            <!-- /.box-body -->
          </div>
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