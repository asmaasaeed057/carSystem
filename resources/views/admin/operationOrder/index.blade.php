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

                        <form action="{{ route('operationOrder.operationSearchIndex')}}" method="GET">
                            <div class="form-group" style="display: block">
                                <label for="operation_order_number">Operation Order Number</label>
                                <input type="text" name="operation_order_number" value="{{$operation_order_number}}" class="form-control" style="width:500px">
                            </div>
                            <div class="form-group">
                                <label for="client_name">Client Name</label>
                                <input type="text" name="client_name" value="{{$client_name}}" class="form-control" style="width:500px">
                            </div>
                            <div class="form-group">
                                <label>Car</label>
                                <select class="form-control" name="car_id" id="clients" style="width: 32%;">
                                    <option value="">Select</option>
                                    @foreach($cars as $value)
                                    <option value="{{$value->id}}" {{($value->id == $car_id) ? 'selected' : '' }}>{{$value->model}} - {{$value->car_color}} - {{$value->carType->name_en}} - {{$value->carCategory->name_en}} - {{$value->carCategory->brand->name_en}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" style="display: block">
                                <label for="technical_name">Technical Employee</label>
                                <input type="text" name="technical_name" value="{{$technical_name}}" class="form-control" style="width:500px">
                            </div>
                            <input type="submit" class="btn-primary" value="search">
                        </form>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Operation Order Date</th>
                                    <th>Operation Order Number</th>

                                    <th>Show</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($operationOrders as $order)
                                @if($order->invoice)
                                @if($order->invoice->repairCard->client->client_type == "contract")
                                <tr>
                                    <td>{{$order->operation_order_date}}</td>
                                    <td>{{$order->operation_order_number}}</td>
                                    <td><a href="{{route('operationOrder.show' ,$order->operation_order_id)}}" class="btn btn-success">Show</a></td>
                                </tr>
                                @endif
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

<script>
    $(document).ready(function() {
        $(".delete").click(function(event) {
            if (!confirm('هل انت متاكد ؟'))
                event.preventDefault();
        });
    });
</script>
@endsection