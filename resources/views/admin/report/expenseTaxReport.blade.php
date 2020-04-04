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

                        <form action="{{ route('expenseTaxSearch')}}" method="GET">

                            <div class="form-group">
                                <label for="date from">From</label>
                                <input type="date" name="expense_date_from" class="form-control" style="width:500px">
                            </div>
                            <div class="form-group" style="display: block">
                                <label for="date to">To</label>
                                <input type="date" name="expense_date_to" class="form-control" style="width:500px">
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
                                        <th>Expense Name</th>
                                        <th>Expense Date</th>
                                        <th>Expense Bill</th>
                                        <th>Expense Price</th>
                                        <th>Expense Notes</th>
                                        <th>Expense Tax</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{$expense->expense_name}}</td>
                                        <td>{{$expense->expense_date}}</td>
                                        <td>{{$expense->expense_bill}}</td>
                                        <td>{{$expense->expense_price}}</td>
                                        <td>{{$expense->expense_notes}}</td>
                                        <td>{{$expense->expense_tax}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                                <tr>
                                    <td colspan="4"></td>
                                    <td><strong>Total Tax</strong></td>
                                    <td>
                                        <input type='text' value="{{$totalTax}}" disabled>

                                    </td>

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

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>
@endsection