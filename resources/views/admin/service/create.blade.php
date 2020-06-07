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
            {{ trans('site.CreateService') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('site.home') }}</a></li>
            <li class="active">{{ trans('site.Dashboard') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

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
                        <!-- <div class="box box-warning"> -->
                            <!-- <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                            </div> -->
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('service.store')}}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>{{ trans('site.ServiceName') }}</label>
                                        <input type="text" name="service_name" class="form-control" placeholder="{{ trans('site.ServiceName') }}">
                                        @if ($errors->get('service_name'))
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            @foreach ($errors->get('service_name') as $service_name)
                                            {{ $service_name }}
                                            @endforeach
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">

                                        <label>{{ trans('site.ServiceNumber') }}</label>
                                        <input type="text" name="service_number" class="form-control" placeholder="{{ trans('site.ServiceNumber') }}">
                                        @if ($errors->get('service_number'))
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            @foreach ($errors->get('service_number') as $service_number)
                                            {{ $service_number }}
                                            @endforeach
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('site.ServiceType') }}</label>

                                        <select class="form-control" name="service_type">
                                            <option value="1">أجور خدمات اليد -الإصلاحات</option>
                                            <option value="2">أجور الأعمال الخارجية </option>
                                            <option value="3">قطع الغيار -مخزن داخلي </option>
                                            <option value="4">قطع غيار -مشتريات خارجية </option>

                                        </select>
                                        @if ($errors->get('service_type'))
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            @foreach ($errors->get('service_type') as $service_type)
                                            {{ $service_type }}
                                            @endforeach
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">

                                        <label>{{ trans('site.ServiceCost') }}</label>
                                        <input type="text" name="service_cost" class="form-control" placeholder="Service Cost">
                                        @if ($errors->get('service_cost'))
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            @foreach ($errors->get('service_cost') as $service_cost)
                                            {{ $service_cost }}
                                            @endforeach
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">

                                        <label>{{ trans('site.ServiceClientCost') }}</label>
                                        <input type="text" name="service_client_cost" class="form-control" placeholder="Service Client Cost">
                                        @if ($errors->get('service_client_cost'))
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            @foreach ($errors->get('service_client_cost') as $service_client_cost)
                                            {{ $service_client_cost }}
                                            @endforeach
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">

                                        <label>{{ trans('site.ServiceWorkingHours') }}</label>
                                        <input type="text" name="service_working_hours" class="form-control" placeholder="{{ trans('site.ServiceWorkingHours') }}">
                                        @if ($errors->get('service_working_hours'))
                                        <span for="textfield" class="help-block error" style="color:firebrick">
                                            @foreach ($errors->get('service_working_hours') as $service_working_hours)
                                            {{ $service_working_hours }}
                                            @endforeach
                                        </span>
                                        @endif
                                    </div>


                                    <input type="submit" class="btn btn-primary" value="{{ trans('site.add') }}">

                                </form>
                            </div>
                            <!-- /.box-body -->
                        <!-- </div> -->
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