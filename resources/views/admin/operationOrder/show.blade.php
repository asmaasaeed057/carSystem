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
    $(document).ready(function() {
        $(".approve").click(function(event) {
            if (!confirm('هل انت متاكد ؟'))
                event.preventDefault();
        });
        $(".denied").click(function(event) {
            if (!confirm('هل انت متاكد ؟'))
                event.preventDefault();
        });

    });
</script>
@endsection

@section('content')
<div class="content-wrapper">
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
                    <div id='printMe'>
                        <!-- /.box-header -->
                        @if($operationOrder->invoice->repairCard->car)

                        <div class="box-body">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Car Info</h3>
                                    <br></br>
                                    <table class="table table-striped table-dark">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Car Model</th>
                                                <td>{{$operationOrder->invoice->repairCard->car->model}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Plate Number</th>
                                                <td>{{$operationOrder->invoice->repairCard->car->platNo}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Structure Number</th>
                                                <td>{{$operationOrder->invoice->repairCard->car->car_structure_number}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Color</th>
                                                <td>{{$operationOrder->invoice->repairCard->car->car_color}}</td>
                                            </tr>
                                            @if($operationOrder->invoice->repairCard->car->carType)
                                            <tr>
                                                <th scope="row">Car Type</th>
                                                <td>{{$operationOrder->invoice->repairCard->car->carType->name_en}}</td>
                                            </tr>
                                            @endif
                                            @if($operationOrder->invoice->repairCard->carCategory)

                                            <tr>
                                                <th scope="row">Car Category</th>
                                                <td>{{$operationOrder->invoice->repairCard->carCategory->name_en}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-header -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        @endif

                        <div class="box-body">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Client Info</h3>
                                    <br></br>
                                    <table class="table table-striped table-dark">
                                        <thead>

                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th scope="row">Client Name</th>
                                                <td>{{$operationOrder->invoice->repairCard->client->fullName}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Client Email</th>
                                                <td>{{$operationOrder->invoice->repairCard->client->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Client Phone</th>
                                                <td>{{$operationOrder->invoice->repairCard->client->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Client Address</th>
                                                <td>{{$operationOrder->invoice->repairCard->client->address}}</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-header -->
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box-body">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Repair Card Info</h3> <br></br>
                                    <table class="table table-striped table-dark">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Card Number</th>
                                                <td>{{$operationOrder->invoice->repairCard->card_number}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Card Status</th>
                                                <td>{{$operationOrder->invoice->repairCard->status}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Check Report</th>
                                                <td>{{$operationOrder->invoice->repairCard->checkReprort}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-header -->
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box-body">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Repair Items and Service</h3>

                                    <table class="table table-striped table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Service Type</th>

                                                <th scope="col">Service Name</th>
                                                <th scope="row">Service Number</th>
                                                <th scope="row">Working Hours</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($operationOrder->invoice->repairCard->items as $item )

                                            <tr>
                                                <td>
                                                    @if($item->service->service_type =="1")
                                                    أجور خدمات اليد )الإصلاحات)

                                                    @elseif($item->service->service_type =="2")
                                                    أجور الأعمال الخارجية
                                                    @elseif($item->service->service_type =="3")
                                                    قطع الغيار )مخزن داخلي)
                                                    @elseif($item->service->service_type =="4")
                                                    قطع غيار )مشتريات خارجية)
                                                    @endif
                                                </td>
                                                <td>{{$item->service->service_name}}</td>
                                                <td>{{$item->service->service_number}}</td>
                                                <td>{{$item->service->service_working_hours}}</td>


                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-header -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <button class="btn bg-navy margin" onclick="printDiv('printMe')" style="text-align:center">Print</button>



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
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>
@endsection