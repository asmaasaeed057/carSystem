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

        <div class="box box-primary" id="printMe">
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
                <tr>
                    <th scope="row">Client Name</th>
                    <td>{{$invoice->client_name}}</td>
                </tr>


                </tr>
                  <th scope="row">Invoice Date</th>
                  <td>{{$invoice->invoice_date}}</td>
                </tr>
                 <tr>
                    <th scope="row">Invoice Total</th>
                    <td>{{$invoice->total_with_taxes}}</td>
                </tr>

              </tbody>
            </table>
         
            <br>

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
                      @foreach($invoice->items as $item )

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
                        <td>{{$item->client_cost}}</td>
                        </tr>

                     @endforeach
                      <tr>
                      <td></td>
                      <th>Total</th>
                      <td>{{$invoice->total}}</td>
                      
                      </tr>
                      <tr>
                      <td></td>
                      <th>Total With Taxes</th>
                      <td>{{$invoice->total_with_taxes}}</td>
                      
                      </tr>

                    </tbody>
                  </table>
                </div>
                <!-- /.box-header -->
              </div>
              <!-- /.box-body -->
            </div>

                <button class="btn bg-navy margin" onclick="printDiv('printMe')" style="text-align:center">Print</button>

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


@endsection