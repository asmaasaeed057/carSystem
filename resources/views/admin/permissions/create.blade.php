@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('FrontEnd') }}/plugins/iCheck/all.css">

@endsection
@section('css')
<style>

#table>tbody>tr>td
    {
        /* display: flex !important; */
        width: 100% !important;

        justify-content: center !important;
    }
</style>
@endsection
@section('script')
<!-- DataTables -->
<script src="https://kit.fontawesome.com/c099210540.js" crossorigin="anonymous"></script>
<script src="{{ asset('FrontEnd') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('FrontEnd') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('FrontEnd') }}/plugins/iCheck/icheck.min.js"></script>

@endsection

@section('js')

<script>
$(function () {

//Red color scheme for iCheck
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
  checkboxClass: 'icheckbox_minimal-red',
  radioClass   : 'iradio_minimal-red'
})
//Flat red color scheme for iCheck
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
})
});

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
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('site.createClient') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ route('permission.store')}}" method="POST">
              @csrf
              @method('POST')
              <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.promt_name_ar')}}</label>
                        <input class="form-control " type="text" name="name_ar" id="">
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.promt_name_en')}}</label>
                        <input class="form-control " type="text" name="name_en" id="">
                    </div>
                </div>
              <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>اضافة</th>
                                        <th>تعديل</th>
                                        <th>عرض</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ __("site.Client") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="clients_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="clients_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="clients_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="clients_delete" value="enable"></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("site.RepairCard") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="reprair_cards_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="reprair_cards_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="reprair_cards_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="reprair_cards_delete" value="enable"></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("site.Reports") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="reports_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="reports_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="reports_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="reports_delete" value="enable"></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("site.Accounting") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="account_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="account_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="account_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="account_delete" value="enable"></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("site.CarsCategory") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="car_catograys_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="car_catograys_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="car_catograys_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="car_catograys_delete" value="enable"></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("site.Administration") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="admin_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="admin_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="admin_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="admin_delete" value="enable"></td>
                                    </tr>

                                    <tr>
                                        <td>{{ __("site.permissions") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="admingroup_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="admingroup_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="admingroup_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="admingroup_delete" value="enable"></td>
                                    </tr>

                                    <tr>
                                        <td>{{ __("site.company") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="companies_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="companies_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="companies_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="companies_delete" value="enable"></td>
                                    </tr>

                                    <tr>
                                        <td>{{ __("site.Cartype") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="car_types_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="car_types_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="car_types_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="car_types_delete" value="enable"></td>
                                    </tr>

                                    <tr>
                                        <td>{{ __("site.car") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="cars_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="cars_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="cars_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="cars_delete" value="enable"></td>
                                    </tr>

                                    <tr>
                                        <td>{{ __("site.box") }}</td>
                                        <td><input type="checkbox" class="flat-red" name="box_add" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="box_edit" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="box_show" value="enable"></td>
                                        <td><input type="checkbox" class="flat-red" name="box_delete" value="enable"></td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br><br>
                <input type="submit" class="btn btn-info" value="{{ trans('site.add') }}">

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
