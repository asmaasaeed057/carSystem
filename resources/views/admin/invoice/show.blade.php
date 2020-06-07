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
      {{ trans('site.invoiceDetails') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('site.home') }}</a></li>
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

            <h3 class="box-title"> {{ trans('site.invoiceNo') }}: {{$invoice->invoice_number}}
            </h3>

            <!--  -->
            <table class="table table-bordered" id="example1">
              <tbody>
                <tr>
                  <th scope="row">{{ trans('site.InvoiceNumber') }}</th>
                  <td>{{$invoice->invoice_number}}</td>
                </tr>


                </tr>
                <th scope="row">{{ trans('site.invoiceDate') }}</th>
                <td>{{$invoice->invoice_date}}</td>
                </tr>
                <tr>
                  <th scope="row">{{ trans('site.totalCost') }}</th>
                  <td>{{$invoice->invoice_total}}</td>
                </tr>

              </tbody>
            </table>

            <br>

          </div>

          <div class="box-body">
            <div class="box">
              <div class="box-header with-border">

                <h3 class="box-title">{{ trans('site.repairCardInfo') }}</h3>

                <!--  -->
                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th scope="col">{{ trans('site.model') }}</th>
                      <td>{{$invoice->repairCard->car->model}}</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{ trans('site.clientName') }}</th>
                      <td>{{$invoice->repairCard->client->fullName}}</td>
                    </tr>
                    <tr>
                      <th scope="row">{{ trans('site.email') }}</th>
                      <td>{{$invoice->repairCard->client->email}}</td>
                    </tr>
                    <tr>
                      <th scope="row">{{ trans('site.phone') }}</th>
                      <td>{{$invoice->repairCard->client->phone}}</td>
                    </tr>
                    <tr>
                      <th scope="row">{{ trans('site.cardStatus') }}</th>
                      <td>{{$invoice->repairCard->status}}</td>
                    </tr>
                    <tr>
                      <th colspan="">{{ trans('site.checkReport') }}</th>
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
                <h3 class="box-title">{{ trans('site.services') }}</h3>

                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th scope="col">{{ trans('site.serviceType') }}</th>

                      <th scope="col">{{ trans('site.service') }}</th>
                      <th scope="row">{{ trans('site.price') }}</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0; ?>
                    @foreach($invoice->repairCard->items as $item )

                    <tr>
                      <td>
                        @if($item->service->service_type =="1")
                        أجور خدمات اليد - الإصلاحات

                        @elseif($item->service->service_type =="2")
                        أجور الأعمال الخارجية
                        @elseif($item->service->service_type =="3")
                        قطع الغيار - مخزن داخلي
                        @elseif($item->service->service_type =="4")
                        قطع غيار- مشتريات خارجية
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
                      <th>{{ trans('site.totalCost') }}</th>
                      <td><?php echo $total ?></td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>{{ trans('site.discount') }}</th>
                      <td><?php echo $invoice->repairCard->card_discount ?></td>
                    </tr>
                    <tr>
                    <tr>

                      <?php $taxes = $invoice->repairCard->card_taxes / 100 ?>
                      <?php $totalWithTaxes = $invoice->repairCard->total_with_taxes; ?>
                      <th></th>

                      <th>{{ trans('site.totalWithTaxes') }}</th>
                      <td><?php echo $totalWithTaxes ?></td>
                    </tr>
                  </tbody>
                </table>

                <div>print


                  <form class="form-inline" action="">
                    <div class="form-group">
                      <label for="paid">{{ trans('site.Paid') }}:</label>
                      <input type="text" class="form-control" value="{{$invoice->paid}}" id="paid" disabled>
                    </div>
                    <div class="form-group">
                      <label for="remain">{{ trans('site.Remain') }}:</label>
                      <input type="text" class="form-control" value="{{$invoice->remain}}" id="remain" disabled>
                    </div>
                    <button class="btn bg-navy margin" onclick="printDiv('printBill')" style="margin-left:200px;"><i class="fa fa-print" style="margin-right: 10px;" ></i>{{ trans('site.PrintBill') }}</button>
                    <td><a class="btn btn-primary" href="{{route('repairCard.addServiceItem' ,$repairCard->id)}}"><i class="fa fa-plus" style="margin-right: 10px;" ></i>{{ trans('site.AddServices') }}</a></td>

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
          <h3 class="box-title">{{ trans('site.InvoicePayment') }}</h3>

          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">{{ trans('site.receiptNumber') }}</th>
                <th scope="col">{{ trans('site.paymentDate') }}</th>
                <th scope="row">{{ trans('site.Paid') }}</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($invoice->invoicePayment as $payment)
              <tr>
                <td>{{$payment->invoice_payment_number}}</td>
                <td>{{$payment->invoice_payment_date}}</td>
                <td>{{$payment->invoice_payment_amount}}</td>
                <td><a class="btn bg-navy margin" target="_blank" href="{{route('receiptInvoicePayment' ,$payment->invoice_payment_id)}}"><i class="fa fa-print" style="margin-right: 10px;" ></i>{{ trans('site.PrintReceipt') }}</a></td>
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

        <a><b>{{ trans('site.address') }}:</b></a>{{ $company->company_address }}

        <div align="center">

          <img src="{{asset('/company_images')}}/{{ $company->company_logo }}" width="50" height="50">
          <a><b>{{ $company->company_name }}</b></a>
        </div>

        <a><b>{{ trans('site.companyPhone') }}:</b></a>{{ $company->company_phone }}

        <h2 style="text-align: center">{{ trans('site.invoiceNo') }}: {{$invoice->invoice_number}}</h2>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">{{ trans('site.repairCardInfo') }}</h3>

            <table class="table table-striped table-dark">

              <tbody>
                <tr scope="row">
                  <th>{{ trans('site.clientName') }}</th>
                  <td>{{$repairCard->client->fullName}}</td>
                  <th>{{ trans('site.email') }}</th>
                  <td>{{$repairCard->client->email}}</td>
                </tr>

                <tr scope="row">
                  <th>{{ trans('site.phone') }}</th>
                  <td>{{$repairCard->client->phone}}</td>
                  <th>{{ trans('site.cardStatus') }}</th>
                  <td>{{$repairCard->status}}</td>
                </tr>


                <tr scope="row">
                  <th>{{ trans('site.model') }}</th>
                  <td>{{$repairCard->car->model}}</td>
                  <th>{{ trans('site.technicalEmployee') }}</th>
                  <td>{{$repairCard->employee->employee_name}}</td>
                </tr>
                <tr>
                  <th colspan="1">{{ trans('site.checkReport') }}</th>
                  <td colspan="3">{{$repairCard->checkReprort}}</td>
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
            <h3 class="box-title">{{ trans('site.services') }}</h3>

            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">{{ trans('site.serviceType') }}</th>
                  <th scope="col">{{ trans('site.service') }}</th>
                  <th scope="row">{{ trans('site.price') }}</th>

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
                  <th>{{ trans('site.totalCost') }}</th>
                  <td><?php echo $total ?></td>
                </tr>
                <tr>
                  <th></th>
                  <th>{{ trans('site.discount') }}</th>
                  <td>{{$repairCard->card_discount}}</td>
                </tr>
                <tr>
                  <th></th>
                  <th>{{ trans('site.taxes') }}</th>
                  <td>{{$repairCard->taxes}}</td>
                </tr>


                <tr>
                  <th></th>

                  <th>{{ trans('site.totalWithTaxes') }}</th>
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
            <h3 class="box-title">{{ trans('site.Notes') }} :</h3>

            <p>{{$billNotes->bill_note_desc_en}}</p>

          </div><!-- /.box-header -->
          <div class="box-body">
          {{ trans('site.Signature') }}:
          </div><!-- /.box-body -->
          <div class="box-footer">
            <table class="table table-striped table-dark">
              <thead>
                <tr>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>{{ trans('site.clientName') }}</th>
                  <td>{{$invoice->repairCard->client->fullName}}</td>
                  <th>{{ trans('site.technicalEmployee') }}</th>
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
    window.location.reload();

  }
</script>
@endsection