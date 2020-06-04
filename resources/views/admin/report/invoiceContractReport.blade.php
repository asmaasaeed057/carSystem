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
                        <h3 class="box-title">Invoice Report Contract Client</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('invoiceContractSearch')}}" method="GET">

                            <div class="form-group">
                                <label for="invoice_number">Invoice Number</label>
                                <input type="text" name="invoice_number" value="{{$invoice_number}}" class="form-control" style="width:500px">
                            </div>
                            <div class="form-group" style="display: block">
                                <label for="client_name">Client Name</label>
                                <input type="text" name="client_name" value="{{$client_name}}" class="form-control" style="width:500px">
                            </div>


                            <div class="form-group">
                                <label for="date from">From</label>
                                <input type="date" name="invoice_date_from" value="{{$invoice_date_from}}" class="form-control" style="width:500px">
                            </div>
                            <div class="form-group" style="display: block">
                                <label for="date to">To</label>
                                <input type="date" name="invoice_date_to" value="{{$invoice_date_to}}" class="form-control" style="width:500px">
                            </div>

                            <input type="submit" class="btn-primary" value="search">
                        </form>
                    </div>
                    <hr>
                    <div class="box-body">
                        <div id='printMe'>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Client Name</th>

                                        <th>Invoice Date</th>
                                        <th>Invoice Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total=0; ?>

                                    @foreach($invoices as $invoice)
                                    @if($invoice->repairCard->client->client_type == "contract")
                                    <tr>
                                        <td>{{$invoice->invoice_number}}</td>
                                        <td>{{$invoice->repairCard->client->fullName}}</td>
                                        <td>{{$invoice->invoice_date}}</td>
                                        <td>{{$invoice->invoice_total}}</td>
                                    </tr>
                                    <?php $total += $invoice->invoice_total; ?>

                                    @endif
                                    @endforeach
                                </tbody>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Total</th>
                                    <th>{{$total}}</th>
                                </tr>


                            </table>
                        </div>

                    </div>

                    <!-- /.box-body -->
                </div>
                <button class="btn bg-navy margin" onclick="printDiv('printMe')" style="text-align:center">Print</button>

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
        $('.dataTables_length').hide();
        $('.dataTables_filter').hide();
        $('.pagination').hide();
        $('.dataTables_info').hide();
        $('.main-footer').hide();
        window.print();

        document.body.innerHTML = originalContents;

    }
</script>
@endsection