<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('FrontEnd') }}/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> مركز السجو لصيانة السيارات
          <small class="pull-right">Date: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <table style="width:100%;">
    <table style="width:100%;">
                <tr>
                  <th style="text-align: left;">
                  <h6 >ALSAJO CENTER FOR CAR MANTANCE</h6>
                  <p>C.R:1010266572 - CC.NO.7231</p>
                  </th>
                  <th>
                  <img src="{{ asset('/') }}/img/logo.png" alt="logo">

                  </th>
                  <th style="text-align: center;">
                  <h6>مركز السجو  لصيانة السيارات</h6>
                  <p>س.ت:١٠١٠٢٦٦٥٧٢ - رقم العضوية: ٧٢٠٣١</p>

                  </th>
                </tr>
                </table>
                <hr>
                <table style="width:100%;" >
                @foreach($info as $value)
                  <tr>
                    <th>Client name :</th>
                    <td>{{$value->client->fullName}}</td>
                    <th>Client Contact :</th>
                    <td>{{$value->client->phone}}</td>
                    <th>Vehicle Type :</th>
                    <td>{{$value->car->carCategory->name_en}}</td>
                    <th>Date :</th>
                    <td>2020-10-02</td>
                  </tr>

                  <tr>
                  <th>Plate NO :</th>
                    <td> {{$value->car->platNo}}</td>
                    <th>Model :</th>
                    <td>{{$value->car->model}}</td>

                    <th>Sales Person :</th>
                    <td></td>
                    <th>VAT NO :</th>
                    <td> 302239599900003</td>
                  </tr>
                  @endforeach

                </table>
                <hr>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
        <thead>
                <tr>
                <th>{{ trans('site.clientName') }}</th>
                  <th>{{ trans('site.carName') }}</th>
                  <th>{{ trans('site.repairCheck') }}</th>

                  <!-- <th>{{ trans('site.Actions') }}</th> -->
                  <th></th>
                </tr>
                </thead>
                <tbody>

               @foreach($accounts as $value)
               <tr>
                <td>{{$value->id}}</td>
                  <td>{{$value->client->fullName}}</td>    <!-- fromCarTable -->
                  <td> {{$value->car->carCategory->name_ar}} </td> <!-- /// -->
                  <!-- <td><a href="{{route('Accounting.edit' ,$value->id)}}"><i class="fas fa-print"></i>print</a> <a href="{{route('Accounting.edit' ,$value->id)}}"><i class="fas fa-print"></i>Show</a> </td> -->
                </tr>
               @endforeach
                </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6"></div>
      <!-- /.col -->
      <div class="box-footer clearfix">
              <div class="col-xs-8">
              </div>
              <div class="col-xs-4">
                <p class="lead">Amount </p>

                <div class="table-responsive">
                    <table class="table">
                    <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ $subTotal }}</td>
                    </tr>
                    <tr>
                        <th>Tax :</th>
                        <td>{{ $tax }}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>{{ $subTotal + $tax  }}</td>
                    </tr>
                    </tbody></table>
                </div>
            </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
