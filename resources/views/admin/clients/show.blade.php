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
    <!-- <h1> -->
    <!-- {{ trans('site.showClient') }} -->
    <!-- </h1> -->
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
          <div>
            <div id='printMe'>

              <div class="box-header">
                <h3>Client Info</h3>
                <div class="box-body">
                  <!--  -->
                  <table class="table table-bordered" id="example1">
                    <tbody>
                      <tr>
                        <td>
                          <h4>{{ trans('site.clientName') }}</h4>
                          <p>{{$client->fullName}}</p>
                        </td>

                        <td>
                          <h4>{{ trans('site.phone') }}</h4>
                          <p>{{$client->phone}}</p>
                        </td>
                        <td>
                          <h4>{{ trans('site.address') }}</h4>
                          <p>{{$client->address}}</p>
                        </td>
                        <td>
                          <h4>{{ trans('site.email') }}</h4>
                          <p>{{$client->email}}</p>
                        </td>

                      </tr>
                    </tbody>
                  </table>

                </div>
                <hr>
                <div class="box-header">
                  <h3>Repair Cards</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Car</th>
                        <th>Card Status</th>
                        <th>Check Reprort</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($repairCards as $card)
                      <tr>
                        <td>Model:{{$card->car->model}} - Plate No: {{$card->car->platNo}} - Color: {{$card->car->car_color}} - Type: {{$card->car->carType->name_en}}</td>
                        <td>{{$card->status}}</td>
                        <td>{{$card->checkReprort}}</td>
                        <td></td>
                      </tr>
                      @endforeach
                    </tbody>

                  </table>
                </div>
              </div>
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