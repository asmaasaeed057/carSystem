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
      Invoice Details
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

            <h3 class="box-title">Invoice</h3>

            <!--  -->
            <table class="table table-bordered" id="example1">
              <tbody>
                <tr>
                  <th scope="row">Invoice Number</th>
                  <td>{{$invoice->invoice_number}}</td>
                </tr>


                </tr>
                <th scope="row">Invoice Date</th>
                <td>{{$invoice->invoice_date}}</td>
                </tr>
                <tr>
                  <th scope="row">Invoice Total</th>
                  <td>{{$invoice->invoice_total}}</td>
                </tr>

              </tbody>
            </table>

            <br>

          </div>

          <div class="box-body">
            <div class="box">
              <div class="box-header with-border">

                <h3 class="box-title">Repair Card</h3>

                <!--  -->
                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Car</th>
                      <td>{{$invoice->repairCard->car->model}}</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Client Name</th>
                      <td>{{$invoice->repairCard->client->fullName}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Client Email</th>
                      <td>{{$invoice->repairCard->client->email}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Client Phone</th>
                      <td>{{$invoice->repairCard->client->phone}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Status</th>
                      <td>{{$invoice->repairCard->status}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Check Report</th>
                      <td>{{$invoice->repairCard->checkReprort}}</td>
                    </tr>
                  </tbody>
                </table>

                <br>

              </div>
            </div>
          </div>

          <div class="box-body">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Items</h3>

                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Service Type</th>

                      <th scope="col">Service</th>
                      <th scope="row">Client Cost</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0; ?>
                    @foreach($invoice->repairCard->items as $item )

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
                      <td>{{$item->service_client_cost}}</td>
                    </tr>
                    <?php $total += $item->service_client_cost ?>
                    @endforeach
                    <tr>
                    <tr>
                      <th></th>
                      <th>Total</th>
                      <td><?php echo $total ?></td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>Discount</th>
                      <td><?php echo $invoice->repairCard->card_discount ?></td>
                    </tr>
                    <tr>
                    <tr>

                      <?php $taxes = $invoice->repairCard->card_taxes / 100 ?>
                      <?php $totalWithTaxes = $invoice->repairCard->total_with_taxes; ?>
                      <th></th>

                      <th>Total With Taxes</th>
                      <td><?php echo $totalWithTaxes ?></td>
                    </tr>
                  </tbody>
                </table>

                <div>


                  <form class="form-inline" action="">
                    <div class="form-group">
                      <label for="paid">Paid:</label>
                      <input type="text" class="form-control" value="{{$invoice->paid}}" id="paid" disabled>
                    </div>
                    <div class="form-group">
                      <label for="remain">Remain:</label>
                      <input type="text" class="form-control" value="{{$invoice->remain}}" id="remain" disabled>
                    </div>
                    <button class="btn bg-navy margin" onclick="printDiv('printBill')" style="margin-left:200px;">Print Bill</button>
                    <!-- <button class="btn bg-navy margin" onclick="printDiv('printBill')" style="float:left;margin-left:600px;" >Add Service</button> -->
                    <!-- <td><a class="btn btn-primary" href="{{route('approved' ,$repairCard->id)}}">Add Service</a></td> -->
                    <td><a class="btn btn-primary" href="{{route('repairCard.addServiceItem' ,$repairCard->id)}}">Add Service</a></td>

                  </form>


                </div>

              </div>
              <!-- /.box-header -->
            </div>
            <!-- /.box-body -->
          </div>




          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="box-body">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Invoice Payment</h3>

          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Number</th>
                <th scope="col">date</th>
                <th scope="row">Amount</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($invoice->invoicePayment as $payment)
              <tr>
                <td>{{$payment->invoice_payment_number}}</td>
                <td>{{$payment->invoice_payment_date}}</td>
                <td>{{$payment->invoice_payment_amount}}</td>
                <td><a class="btn bg-navy margin" href="{{route('receiptInvoicePayment' ,$payment->invoice_payment_id)}}"> Print Receipt</a></td>
              </tr>
              @endforeach

            </tbody>
          </table>

        </div>
        <!-- /.box-header -->
      </div>
      <!-- /.box-body -->
    </div>






    <div id='printBill' hidden>
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
                <tr>
                  <th scope="row">Check Report</th>
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
            <h3 class="box-title">Items</h3>

            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">Service Type</th>

                  <th scope="col">Service</th>
                  <th scope="row">Client Cost</th>

                </tr>
              </thead>
              <tbody>
                <?php $total = 0; ?>
                @foreach($repairCard->items as $item )

                <tr>
                  <td>
                    @if($item->service->service_type =="1")
                    أجور خدمات اليد -الإصلاحات

                    @elseif($item->service->service_type =="2")
                    أجور الأعمال الخارجية
                    @elseif($item->service->service_type =="3")
                    قطع الغيار -مخزن داخلي
                    @elseif($item->service->service_type =="4")
                    قطع غيار -مشتريات خارجية
                    @endif
                  </td>
                  <td>{{$item->service->service_name}}</td>
                  <td>{{$item->service_client_cost}}</td>
                </tr>
                <?php $total += $item->service_client_cost ?>
                @endforeach
                <tr>
                  <th></th>
                  <th>Total</th>
                  <td><?php echo $total ?></td>
                </tr>
                <tr>
                  <th></th>
                  <th>Discount</th>
                  <td>{{$repairCard->card_discount}}</td>
                </tr>
                <tr>
                  <th></th>
                  <th>Taxes</th>
                  <td>{{$repairCard->taxes}}</td>
                </tr>


                <tr>
                  <th></th>

                  <th>Total With Taxes</th>
                  <td>{{$repairCard->total_with_taxes}}</td>
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
            <h3 class="box-title">Notes :</h3>

            <p>{{$billNotes->bill_note_desc_en}}</p>

          </div><!-- /.box-header -->
          <div class="box-body">
            Signature
          </div><!-- /.box-body -->
          <div class="box-footer">
            <table class="table table-striped table-dark">
              <thead>
                <tr>

                </tr>
              </thead>
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