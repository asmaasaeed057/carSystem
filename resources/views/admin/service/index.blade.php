@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('script')
<!-- DataTables -->
<script src="https://kit.fontawesome.com/c099210540.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
            {{ trans('site.Services') }}
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
                        <h3 class="box-title"></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-header">
                        <a href="{{route('service.create')}}" style="margin-top: 10px;" class="btn btn-success"><i class="fa fa-plus" style="margin-right: 10px;" ></i>{{ trans('site.add') }} </a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('site.ServiceName') }}</th>
                                    <th>{{ trans('site.ServiceNumber') }}</th>
                                    <th>{{ trans('site.ServiceType') }}</th>
                                    <th>{{ trans('site.ServiceCost') }}</th>
                                    <th>{{ trans('site.ServiceClientCost') }}</th>
                                    <th>{{ trans('site.ServiceWorkingHours') }}</th>
                                    <th>{{ trans('site.Edit') }}</th>
                                    <th>{{ trans('site.Delete') }}</th>
                                    <th>{{ trans('site.Show') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($services as $service)
                                <tr style=>
                                    <td>{{$service->service_name}}</td>
                                    <td>{{$service->service_number}}</td>
                                    @if($service->service_type == 1)
                                    <td>أجور خدمات اليد -الإصلاحات</td>
                                    @elseif($service->service_type == 2)
                                    <td>أجور الأعمال الخارجية</td>

                                    @elseif($service->service_type == 3)
                                    <td>قطع الغيار -مخزن داخلي</td>

                                    @else
                                    <td> قطع غيار -مشتريات خارجية</td>

                                    @endif


                                    <td>{{$service->service_cost}}</td>
                                    <td>{{$service->service_client_cost}}</td>
                                    <td>{{$service->service_working_hours}}</td>

                                    <td><a href="{{route('service.edit' ,$service->service_id)}}" class="btn btn-info"><i class="fa fa-edit" style="margin-right: 10px;" ></i>{{ trans('site.Edit') }}</a></td>
                                    <td>

                                        <form action="{{route('service.destroy' ,$service->service_id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger delete" type="submit"><i class="fa fa-trash-o" style="margin-right: 10px;" ></i>{{ trans('site.Delete') }}</button>

                                        </form>
                                    </td>
                                    <td><a href="{{route('service.show' ,$service->service_id)}}" class="btn btn-success"><i class="fa fa-search" style="margin-right: 10px;" ></i>{{ trans('site.Show') }}</a></td>


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

<script>
    $(document).ready(function() {
        $(".delete").click(function(event) {
            if (!confirm('هل انت متاكد ؟'))
                event.preventDefault();
        });
    });
</script>
@endsection