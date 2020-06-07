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
      {{ trans('site.cardList') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('site.home') }}</a></li>
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
            <!-- <h3 class="box-title">{{ trans('site.Dashboard') }}</h3> -->
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
                    <label>{{ trans('site.clientName') }}</label>
                    <select class="form-control" name="client_id" id="clients" style="width: 100%;">
                      <option value="">{{ trans('site.options') }}</option>
                      @foreach($clients as $value)
                      <option value="{{$value->id}}" {{($value->id == $clientId) ? 'selected' : '' }}>{{$value->fullName}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ trans('site.date') }}</label>
                    <br />
                    <input value="{{$datefrom}}" type="date" placeholder="من" value="" size="60" maxlength="120" name="date_from" id="" class="input-medium" />:
                    <input value="{{$dateto}}" type="date" placeholder="من" value="" size="60" maxlength="120" name="date_to" id="" class="input-medium" />

                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ trans('site.CarsCategory') }}</label>
                    <select class="form-control" name="car_brand_category_id" style="width: 100%;">
                      <option value="">{{ trans('site.options') }}</option>
                      @foreach($categories as $value)
                      <option value="{{$value->id}}" {{($value->id == $categoryId) ? 'selected' : '' }}>{{$value->name_en}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ trans('site.plate') }}</label>
                    <input value="{{$platNo}}" type="text" placeholder="{{ trans('site.plate') }}" size="60" maxlength="120" name="plat_number" id="" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="row">

                <?php $statusAr = array('panding', 'accepted', 'finished', 'underMaintance', 'denied'); ?>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ trans('site.cardStatus') }}</label>
                    <select class="form-control" name="status" style="width: 100%;">
                      <option value="">{{ trans('site.options') }}</option>
                      @foreach($statusAr as $value)
                      <option value="{{$value}}" {{($value == $status) ? 'selected' : '' }}>{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ trans('site.cardNo') }}</label>
                    <input value="{{$cardNo}}" type="text" placeholder="{{ trans('site.cardNo') }}" size="60" maxlength="120" name="card_number" id="" class="form-control" />
                  </div>
                </div>
              </div>




              <div class="form-actions">

                <input id="submit" type="submit" name="submit" value="{{ trans('site.search') }}" class="btn btn-primary btn-large">
              </div>
          </div>
          </form>




          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>{{ trans('site.cardNo') }}</th>
                <th>{{ trans('site.clientName') }}</th>
                <th>{{ trans('site.CarsCategory') }}</th>
                <th>{{ trans('site.CarsBrandCategory') }}</th>
                <th>{{ trans('site.model') }}</th>
                <th>{{ trans('site.plate') }}</th>
                <th>{{ trans('site.cardStatus') }}</th>
                <th>{{ trans('site.cardDate') }}</th>

                <th colspan="2"></th>
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
                <td><a class="btn btn-success" href="{{route('reprairCard.show' ,$value->id)}}"> <i class="fa fa-search" style="margin-right: 10px;" ></i>{{ trans('site.show') }}</a></td>


                @if($value->status == 'accepted')
                @if(!$value->invoice)
                <td><a class="inv btn btn-primary" href="{{route('createInvoice',$value->id)}}"> <i class="fa fa-plus" style="margin-right: 10px;" ></i>{{ trans('site.addInvoice') }}</a></td>
                @endif
                @if($value->client->client_type == 'noneContract')
                <td> <a class="btn btn-warning payment" href="{{route('invoicePayment',$value->invoice->invoice_id)}}"><i class="fas fa-money" style="margin-right: 10px;"></i>{{ trans('site.pay') }}</a>
                <td><a class="btn btn-primary" href="{{route('noneContractClient.editNoneContractClient' ,$value->id)}}"><i class="fa fa-edit" style="margin-right: 10px;" ></i> {{ trans('site.edit') }}</a></td>

                @endif
                @endif

                @if($value->status == 'panding')

                <td><a class="btn btn-primary" href="{{route('reprairCard.edit' ,$value->id)}}"> <i class="fa fa-edit" style="margin-right: 10px;" ></i>{{ trans('site.edit') }}</a></td>
                <td><a class="btn btn-danger denied" href="{{route('denied' ,$value->id)}}"> <i class="fa fa-trash-o" style="margin-right: 10px;" ></i>{{ trans('site.denied') }}</a></td>
                <td><a class="btn btn-success approve" href="{{route('approved' ,$value->id)}}"><i class="fa fa-check" style="margin-right: 10px;" ></i> {{ trans('site.approved') }}</a></td>
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
