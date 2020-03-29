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
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('site.RepairCardD')}}</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <td><h4>{{ trans('site.clientName')}}</h4><p>{{$repairCard->client->fullName}}</p></td>
                  
                  <td><h4>{{ trans('site.carName')}}</h4><p>{{$repairCard->car->carCatogray->name_en}}</p></td>
                  <td ><h4>{{ trans('site.phone')}}</h4><p>{{$repairCard->client->phone}}</p></td>
                  <td ><h4>{{ trans('site.plat')}}</h4><p>{{$repairCard->car->platNo}}</p></td>
                  
                </tr>
                <tr>
                  <td><h4>{{ trans('site.companyNameSi')}}</h4><p>{{$repairCard->car->carCatogray->company->name_en}}</p></td>
                  <td><h4>{{ trans('site.CarTypeNamex')}}</h4><p>{{$repairCard->car->carType->name_en}}</p></td>
                  <td><h4>{{ trans('site.model')}}</h4><p>{{$repairCard->car->model}}</p></td>
                 
                  <td><h4>{{trans('site.status')}}</h4><p>{{$repairCard->status}}</p></td>
                  

                </tr>            
              </tbody></table>
              <br>
              <div class="box">
        <div class="box-header with-border">
          <h1 class="box-title">{{trans('site.repairCheck')}}</h1>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!-- checkReport goes here  -->
          <p>{{$repairCard->checkReprort}}</p>
        </div>
        <!-- /.box-body -->

      </div>
      <div class="box">
            
            
          </div>
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
