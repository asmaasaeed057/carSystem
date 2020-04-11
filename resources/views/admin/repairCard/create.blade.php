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
<style>
  select {
    width: 200px;
  }
</style>
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
<script>
  var j = 1;
  $(document).ready(function() {
    changeClient();
    changeService(0);
    //////$('#service_type_0').select2();

    showPrice(0);
    $('.add').click(function() {
      addRow();
    });
  });


  function addRow() {
    var i = j++;

    var tr =
      '<tr>' +
      '<td><select class="form-control" name="service_type[' + i + ']" id="service_type_' + i + '" onchange="changeService(' + i + ')"><option value="">Select</option><option value="1">أجور خدمات اليد )الإصلاحات)</option><option value="2">أجور الأعمال الخارجية </option><option value="3">قطع الغيار )مخزن داخلي) </option><option value="4">قطع غيار )مشتريات خارجية) </option></select></td>' +
      '<td><select onchange="showPrice(' + i + ')" name="services[' + i + ']" id="services_' + i + '" class="form-control select2"><option value="">Select One</option></select></td>' +
      '<td><div class="form-group"><input type="text" name="price[' + i + ']" id="price_' + i + '"></td>' +
      '<td><input type="button" class="btn btn-green add" value="+" onclick="addRow()"><input type="button" class="btn btn-danger delete" value="x" onclick="removeItem(this,' + i + ')"></td>' +
      '</tr>'

    $('#services').append(tr);
    //  $('#service_type_'+i).select2();
  }

  function removeItem(e, count) {
    var total = $('#total_price').val();
    var price = $('#price_' + count).val();
    var total2 = Number(total) - Number(price);
    $('#total_price').val(total2);
    if (confirm("هل أنت متأكد؟")) {
      $(e).parent().parent().remove();
    }
  }


  function changeClient() {

    $('#clients').change(function() {
      if ($(this).val() != '') {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();
        $.ajax({
          method: "POST",
          url: "{{ route('getCars') }}",
          data: {
            select: select,
            value: value,
            _token: _token,
            dependent: dependent
          },
          success: function(result, date) {
            $('#cars').html(result);
          }

        })
      }
    });
  }

  function changeService(count) {
    $('#price_' + count).val("");

    var value = $('#service_type_' + count).val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
      method: "POST",
      url: "{{ route('getServices') }}",
      data: {
        value: value,
        _token: _token
      },
      success: function(result, date) {
        $('#services_' + count).html(result);
      }

    })
  }

  function showPrice(count) {
    var total = 0;
    var value = $('#services_' + count).val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
      method: "POST",
      url: "{{ route('getPrice') }}",
      data: {
        value: value,
        _token: _token
      },
      success: function(result, date) {
        var total = 0;
        $('#price_' + count).val(result);
        for (var p = 0; p <= count; p++) {
          var price = $('#price_' + p).val();
          total += Number(price);

        }
        $('#total_price').val(total);
      }

    })

  }
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
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">{{ trans('site.addRepairCar') }}</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form action="{{ route('reprairCard.store')}}" method="POST">
                  @csrf
                  @method('POST')

                  <div class="row">
                    @if($clientId)


                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Client</label>
                        <input type='text' class="form-control" value="{{$client->fullName}}" disabled>
                        <input type='text' value="{{$client->id}}" name="client_id" hidden>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cars</label>
                        <select name="car_id" id="cars" class="form-control clientIdselect2" data-dependent="car">
                          @foreach($clientCars as $car)
                          <option value="{{$car->id}}">Car Category : {{$car->carCategory->name_en}} -Model : {{$car->model}} -Plate No: {{$car->platNo}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    @else
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Client</label>
                        <select class="form-control" name="client_id" id="clients" style="width: 100%;">
                          <option value="">Select</option>
                          @foreach($clients as $value)
                          <option value="{{$value->id}}">{{$value->fullName}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cars</label>
                        <select name="car_id" id="cars" class="form-control clientIdselect2" data-dependent="car">
                          <option value="">Select One</option>
                        </select>
                      </div>
                    </div>
                    @endif


                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label>Cars</label>
                        <select name="car_id" id="cars" class="form-control clientIdselect2" data-dependent="car">
                          <option value="">Select One</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Employee</label>
                        <select class="form-control" name="employee_id" id="" style="width: 100%;">
                          <option value="">Select</option>
                          @foreach($employee as $emp)
                          <option value="{{$emp->employee_id}}">{{$emp->employee_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label for="">
                        <h4>{{ trans('site.addRepairCheck') }}</h4>
                      </label>
                      <textarea class="form-control" name="checkReprort" id="" cols="30" rows="10"></textarea>
                    </div>
                  </div>


                  <?php $taxes = 5 ?>

                  <input type="text" value={{$taxes}} name="card_taxes" hidden>
                  <input type="text" value={{$number+1}} name="card_number" hidden>


                  <div class="container">
                    <h2>Items</h2>
                    <table class="table table-condensed">
                      <thead>
                        <tr>
                          <th>Service Type</th>
                          <th>Services</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody id='services'>
                        <tr>
                          <td>
                            <select class="form-control" name="service_type[0]" id="service_type_0" onchange="changeService(0)">
                              <option value="">Select</option>

                              <option value="1">أجور خدمات اليد )الإصلاحات)</option>
                              <option value="2">أجور الأعمال الخارجية </option>
                              <option value="3">قطع الغيار )مخزن داخلي) </option>
                              <option value="4">قطع غيار )مشتريات خارجية) </option>

                            </select>


                          </td>
                          <td>
                            <select name="services[0]" id="services_0" class="form-control select2" onchange="showPrice(0)">
                              <option value="">Select One</option>
                            </select>


                          </td>
                          <td>
                            <input type='text' name="price[0]" id="price_0">

                          </td>
                          <td>
                            <input type="button" class="btn btn-green add" value="+">

                          </td>
                        </tr>
                      </tbody>
                      <tr>
                        <td colspan="2"></td>
                        <td><strong>Total Price</strong></td>
                        <td>
                          <input type='text' name="totalPrice" id="total_price">

                        </td>

                      </tr>

                    </table>
                  </div>

              

                  <input type="submit" class="btn btn-info" value="{{__('site.add')}}">
                </form>
              </div>
              <!-- /.box-body -->
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
@endsection