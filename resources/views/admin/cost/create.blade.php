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
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
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
              <h3 class="box-title">{{ trans('site.createClient') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ route('cost.store')}}" method="POST">
              @csrf
              @method('POST')

                <!-- text input -->
                <div class="form-group">
                  <label for="">{{ trans('site.type') }} :</label>
                  <select name="type" id="" class="form-control select2">
                  <option value="cost">مصروف</option>

                  <option value="paymentVoucher">سند صرف</option>
                  <option value="salary">رواتب</option>
                  <option value="others">اخرى</option>
                   </select>
                </div>
                <div class="form-group">
                  <label>{{ trans('site.beneficiary') }} :</label>
                  <input type="text"name="beneficiary" class="form-control" placeholder="{{ trans('site.CarTypeName') }}">
                </div>

                <div class="form-group">
                  <label>{{ trans('site.getcost') }} :</label>
                  <input type="text"name="amount" class="form-control" placeholder="{{ trans('site.getcost') }}">
                </div>

                <div class="form-group">
                  <label>{{ trans('site.thatsFor') }} :</label>
                  <input type="text"name="note" class="form-control" placeholder="{{ trans('site.thatsFor') }}">
                </div>
                <style>
                
                .paymentType{
                        color: #fff;
                        padding: 20px;
                        display: none;
                        margin-top: 20px;
                    }
              </style>
                <div class="form-group">
                  <label>{{ trans('site.paymentMethod') }} :</label><br>
                  <input type="radio" name="paymentType" value="cash" id="" checked> <span>Cash</span> 
                  <input type="radio" name="paymentType" value="transfer" id=""> <span>transfater</span> 
                  <input type="radio" name="paymentType" value="cheque" id=""> <span>cheque</span> 
                </div>

                <div class="form-group">

                  <label>{{ trans('site.bankName') }} :</label>
                  <input type="text"name="bankName" class="form-control" placeholder="{{ trans('site.bankName') }}">

                </div>
                    <div class="transfer box">
                    
                    <div class="form-group">
                    <label>{{ trans('site.bankAccountNo') }} :</label>
                    <input type="text"class="form-control" name="pay_no" id="">
                  </div>
                  <div class="form-group">
                    <label>{{ trans('site.cardHolder') }} :</label>
                    <input type="text"class="form-control" name="cardHolder" id="">
                  </div>
                  
                  <div class="form-group">
                    <label>{{ trans('site.pay_date') }} :</label>
                    <input type="date"class="form-control" name="pay_date" id="">
                  </div>
                  
                  
                 
                  
                </div>
                <br><br>
                
                <input type="submit" class="btn btn-info" value="{{ trans('site.add') }}">

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
  <script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
@endsection
