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
  $(document).ready(function() {
    $(".approve").click(function(event) {
      if (!confirm('هل انت متاكد ؟'))
        event.preventDefault();
    });
    $(".denied").click(function(event) {
      if (!confirm('هل انت متاكد ؟'))
        event.preventDefault();
    });
    $(".inv").click(function(event) {
      if (!confirm('هل انت متاكد من انشاء فاتورة؟'))
        event.preventDefault();
    });
    $(".payment").click(function(event) {
      if (!confirm('هل انت متاكد من سداد الفاتورة؟'))
        event.preventDefault();
    });

  });
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
            <form method="get" action="{{route('cardSearch')}}">

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
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date</label>
                    <br />
                    <input value="{{$datefrom}}" type="date" placeholder="من" value="" size="60" maxlength="120" name="date_from" id="" class="input-medium" />:
                    <input value="{{$dateto}}" type="date" placeholder="من" value="" size="60" maxlength="120" name="date_to" id="" class="input-medium" />

                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="car_brand_category_id" style="width: 100%;">
                      <option value="">Select</option>
                      @foreach($categories as $value)
                      <option value="{{$value->id}}" {{($value->id == $categoryId) ? 'selected' : '' }}>{{$value->name_en}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>plat Number</label>
                    <input value="{{$platNo}}" type="text" placeholder="Plat Number" size="60" maxlength="120" name="plat_number" id="" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="row">

                <?php $statusAr = array('panding', 'accepted', 'finished', 'underMaintance', 'denied'); ?>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" style="width: 100%;">
                      <option value="">Select</option>
                      @foreach($statusAr as $value)
                      <option value="{{$value}}" {{($value == $status) ? 'selected' : '' }}>{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Card Number</label>
                    <input value="{{$cardNo}}" type="text" placeholder="Card Number" size="60" maxlength="120" name="card_number" id="" class="form-control" />
                  </div>
                </div>
              </div>




              <div class="form-actions">

                <input id="submit" type="submit" name="submit" value="Search" class="btn btn-primary btn-large">
              </div>
          </div>
          </form>




          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Card Number</th>
                <th>Client</th>
                <th>Category</th>
                <th>Category Brand</th>
                <th>Car Model</th>
                <th>Car PLat Number</th>
                <th>Status</th>
                <th>Created At</th>

                <th colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach($repairCards as $value)
              <tr>
                <td>{{$value->card_number}}</td>

                <td>{{$value->client->fullName}}</td>
                <td>{{$value->car->carCategory->name_en}}</td>
                <td>{{$value->car->carCategory->brand->name_en}}</td>
                <td>{{$value->car->model}}</td>
                <td>{{$value->car->platNo}}</td>
                <td>{{$value->status}}</td>
                <td>{{$value->created_at}}</td>
                <td><a class="btn btn-success" href="{{route('reprairCard.show' ,$value->id)}}"> SHOW</a></td>


                @if($value->status == 'accepted')
                @if(!$value->invoice)
                <td><a class="inv btn btn-primary" href="{{route('createInvoice',$value->id)}}"> Add Invoice</a></td>
                @endif
                @if($value->client->client_type == 'noneContract')
                <td> <a class="btn btn-warning payment" href="{{route('invoicePayment',$value->invoice->invoice_id)}}"><i class="fas fa-money" style="margin-right: 10px;"></i>pay</a>
                <td><a class="btn btn-primary" href="{{route('noneContractClient.editNoneContractClient' ,$value->id)}}"> EDIT</a></td>

                @endif
                @endif

                @if($value->status == 'panding')

                <td><a class="btn btn-primary" href="{{route('reprairCard.edit' ,$value->id)}}"> EDIT</a></td>
                <td><a class="btn btn-danger denied" href="{{route('denied' ,$value->id)}}"> denied</a></td>
                <td><a class="btn btn-success approve" href="{{route('approved' ,$value->id)}}"> Approve</a></td>
                @endif

              </tr>
              @endforeach
            </tbody>

          </table>
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