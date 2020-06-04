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
      Client Report
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
            <form method="get" action="{{route('clientSearch')}}">

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Client</label>
                    <select class="form-control" name="client_id" id="clients" style="width: 100%;">
                      <option value="">Select</option>
                      @foreach($clients as $value)
                      <option value="{{$value->id}}" {{($value->id == $clientId) ? 'selected' : '' }}>{{$value->fullName}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-actions">

                <input id="submit" type="submit" name="submit" value="Search" class="btn btn-primary btn-large">
              </div>
          </div>
          </form>
          @if($cards)
          <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Car</th>
                  <th>Total</th>
                  <th>Total With Taxes</th>
                </tr>
              </thead>
              <tbody>
              <?php $total=0; ?>
              <?php $totalWithTaxes=0; ?>


                @foreach($cards as $value)
                <tr>
                  <td>{{$value->car->carCategory->brand->name_en}}-{{$value->car->model}}-{{$value->car->platNo}}</td>
                  <td>{{$value->total}}</td>
                  <td>{{$value->total_with_taxes}}</td>

                </tr>
                <?php $total += $value->total; ?>
                <?php $totalWithTaxes += $value->total_with_taxes; ?>

                @endforeach
                <tr>
                <th>Total</th>
                <th>{{$total}}</th>
                <th>{{$totalWithTaxes}}</th>

                </tr>
              </tbody>

            </table>
          </div>
          @endif


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


@endsection