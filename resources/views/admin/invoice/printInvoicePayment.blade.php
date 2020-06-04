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
      Receipt Details
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">{{ trans('site.Dashboard') }}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    @include('layouts.error')
    <style>
      th {
        width: 40%;
      }

      /* Style the tab */
      .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
      }

      /* Style the buttons inside the tab */
      .tab button {
        background-color: inherit;

        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
      }

      /* Change background color of buttons on hover */
      .tab button:hover {
        background-color: #ddd;
      }

      /* Create an active/current tablink class */
      .tab button.active {
        background-color: #ccc;
      }

      /* Style the tab content */
      .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
      }
    </style>





    <div id='printReceipt'>
      <div id="company" class='container'>

        <a><b>Address:</b></a>{{ $company->company_address }}

        <div align="center">

          <img src="{{asset('/company_images')}}/{{ $company->company_logo }}" width="50" height="50">
          <a><b>{{ $company->company_name }}</b></a>
        </div>

        <a><b>phones:</b></a>{{ $company->company_phone }}
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Repair Card</h3>

            <table class="table table-striped table-dark">

              <tbody>
                <tr scope="row">
                  <th>Client Name</th>
                  <td>{{$repairCard->client->fullName}}</td>
                  <th>Client Email</th>
                  <td>{{$repairCard->client->email}}</td>
                </tr>

                <tr scope="row">
                  <th>Client Phone</th>
                  <td>{{$repairCard->client->phone}}</td>
                  <th>Status</th>
                  <td>{{$repairCard->status}}</td>
                </tr>


                <tr scope="row">
                  <th>Car</th>
                  <td>{{$repairCard->car->model}}</td>
                  <th>Technical Employee</th>
                  <td>{{$repairCard->employee->employee_name}}</td>
                </tr>
                <tr scope="row">
                  <th>Check Report</th>
                  <td>{{$repairCard->checkReprort}}</td>
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

            <table class="table table-striped table-dark">

              <tbody>
                <tr>
                  <th>Paid</th>
                  <td>{{$invoicePayment->invoice_payment_amount}}</td>
                  <th>Date</th>
                  <td>{{$invoicePayment->invoice_payment_date}}</td>

                </tr>
              </tbody>
            </table>
          </div><!-- /.box-header -->

          <div class="box-body">

            <table class="table table-striped table-dark">

              <tbody>
                <tr>
                  <th>Remain</th>

                  <td>{{$invoice->remain}}</td>

                </tr>
              </tbody>
            </table>

          </div>
          <div class="box-footer">
            <table class="table table-striped table-dark">

              <tbody>
                <tr>
                  <th>client Name</th>

                  <td>{{$invoice->repairCard->client->fullName}}</td>
                  <th>Technical Employee</th>
                  <td>{{$repairCard->employee->employee_name}}</td>

                </tr>
              </tbody>
            </table>
          </div><!-- box-footer -->
        </div><!-- /.box -->

      </div>

    </div>


    <button class="btn bg-navy margin" onclick="printDiv('printReceipt')" style="margin-left:550px;">Print</button>

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