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
                                <h3 class="box-title">Update Service</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('service.update' ,$service->service_id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Service Name</label>
                                        <input type="text" name="service_name" class="form-control" placeholder="Service Name" value="{{$service->service_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Service Number</label>
                                        <input type="text" name="service_number" class="form-control" placeholder="Service Number" value="{{$service->service_number}}">
                                    </div>
                                   

                                    <div class="form-group">
                                        <label>Service Type</label>

                                        <select class="form-control" name="service_type">
                                            <option value="">اختار</option>
                                            <option value="1" {{($service->service_type == 1) ? 'selected' : '' }}>أجور خدمات اليد )الإصلاحات)</option>
                                            <option value="2" {{($service->service_type == 2) ? 'selected' : '' }}>أجور الأعمال الخارجية </option>
                                            <option value="3" {{($service->service_type == 3) ? 'selected' : '' }}>قطع الغيار )مخزن داخلي) </option>
                                            <option value="4" {{($service->service_type == 4) ? 'selected' : '' }}>قطع غيار )مشتريات خارجية) </option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Service Cost</label>
                                        <input type="text" name="service_cost" class="form-control" placeholder="Service Cost" value="{{$service->service_cost}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Service Client Cost</label>
                                        <input type="text" name="service_client_cost" class="form-control" placeholder="Service Client Cost" value="{{$service->service_client_cost}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Service Working Hours</label>
                                        <input type="text" name="service_working_hours" class="form-control" placeholder="Service Working Hours" value="{{$service->service_working_hours}}">
                                    </div>
                                    <input type="submit" class="btn-primary" value="Update">

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