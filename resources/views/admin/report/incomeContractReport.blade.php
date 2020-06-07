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
            {{ trans('site.IncomeReportContractClient') }}
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
                    <div class="box-body">

                        <form action="{{ route('incomeContractSearch')}}" method="GET">


                            <div class="form-group">
                                <label for="date from">{{ trans('site.From') }}</label>
                                <input type="date" name="income_date_from" value="{{$income_date_from}}" class="form-control" style="width:500px">
                            </div>
                            <div class="form-group" style="display: block">
                                <label for="date to">{{ trans('site.To') }}</label>
                                <input type="date" name="income_date_to" value="{{$income_date_to}}" class="form-control" style="width:500px">
                            </div>

                            <input type="submit" class="btn btn-primary" value="{{ trans('site.Search') }}">
                        </form>
                    </div>
                    <hr>
                    <div class="box-body">
                        <div id='printMe'>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ trans('site.Number') }}</th>
                                        <th> {{ trans('site.Date') }}</th>
                                        <th>{{ trans('site.PaymentAmount') }}</th>
                                        <th>{{ trans('site.InvoiceNumber') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $totalPayment = 0; ?>

                                    @foreach($incomes as $income)
                                    @if($income->invoice->repairCard->client->client_type == "contract")

                                    <tr>
                                        <td>{{$income->invoice_payment_number}}</td>
                                        <td>{{$income->invoice_payment_date}}</td>
                                        <td>{{$income->invoice_payment_amount}}</td>

                                        <td>{{$income->invoice->invoice_number}}</td>
                                    </tr>
                                    <?php $totalPayment += $income->invoice_payment_amount; ?>

                                    @endif
                                    @endforeach
                                </tbody>
                                <tr>
                                    <th></th>
                                    <th> {{ trans('site.Total') }}</th>
                                    <th>{{$totalPayment}}</th>
                                    <th></th>
                                </tr>

                            </table>
                        </div>

                    </div>

                    <!-- /.box-body -->
                </div>
                <div class="col text-center">

                    <button class="btn bg-navy margin" onclick="printDiv('printMe')" style="text-align:center"> <i class="fa fa-print" style="margin-right: 10px;" ></i>{{ trans('site.Print') }}</button>
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