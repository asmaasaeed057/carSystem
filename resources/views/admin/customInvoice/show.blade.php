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

  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();

    document.body.innerHTML = originalContents;
    window.location.reload();

  }
</script>

</script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ trans('site.InvoiceDetails') }}
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
        width: 15%;
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

        <div class="box-header">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box box-primary" id="printMe">

          <div class="box-body">

            <h3 class="box-title">{{ trans('site.Invoice') }}</h3>

            <!--  -->
            <table class="table table-bordered" id="example1">
              <tbody>
                <tr>
                  <th scope="row">{{ trans('site.InvoiceNumber') }}</th>
                  <td>{{$invoice->invoice_number}}</td>
                </tr>
                <tr>
                  <th scope="row">{{ trans('site.clientName') }}</th>
                  <td>{{$invoice->client_name}}</td>
                </tr>


                </tr>
                <th scope="row">{{ trans('site.Date') }}</th>
                <td>{{$invoice->invoice_date}}</td>
                </tr>
                <tr>
                  <th scope="row">{{ trans('site.Total') }}</th>
                  <td>{{$invoice->total_with_taxes}}</td>
                </tr>

              </tbody>
            </table>

            <br>

          </div>

          <div class="box-body">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">{{ trans('site.Items') }}</h3>

                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th>{{ trans('site.ServiceType') }}</th>

                      <th>{{ trans('site.Services') }}</th>
                      <th>{{ trans('site.price') }}</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0; ?>
                    @foreach($invoice->items as $item )

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
                      <td>{{$item->client_cost}}</td>
                    </tr>

                    @endforeach


                    <tr>
                      <th></th>
                      <th>{{ trans('site.Total') }}</th>
                      <td><?php echo $invoice->total ?></td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>{{ trans('site.Discount') }}</th>
                      <td><?php echo $invoice->invoice_discount ?></td>
                    </tr>
                    <tr>
                    <tr>
                      <th></th>
                      <th>{{ trans('site.TotalPriceWithTaxes') }}</th>
                      <td><?php echo $invoice->total_with_taxes ?></td>
                    </tr>


                  </tbody>
                </table>
              </div>
              <!-- /.box-header -->
            </div>
            <!-- /.box-body -->
          </div>


          <!-- /.box-body -->
        </div>
        <div class="col text-center">
          <button class="btn bg-navy margin" onclick="printDiv('printMe')" style="text-align:center"><i class="fa fa-print" style="margin-right: 10px;"></i>
            {{ trans('site.Print') }}</button>
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