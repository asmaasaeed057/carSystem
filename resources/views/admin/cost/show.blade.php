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
            
                  <table  style="width:90%;margin-right:auto;margin-left:auto">
                  <!--  Header  -->
                  <tr style="height:60px;">
                    <th><h4>AL-Sajow Car Maintenance Center </h4> <span>{{$costList->created_at->toDateString()}}</span></th>
                    
                    <th> <img style="width:50px; margin-left:25px;" src="{{ asset('/') }}/img/logo.png" alt="logo"></th>
                    <th><h4>مركز السجو لصيانة السيارات </h4></th>
                    
                  </tr>
                  <hr>
                  <tr>
                    <th> </th>
 
                    <th><h4 style="margin-left:20px;">سند صرف </h4><h4>Payment Voucher</h4></th>
                    
                    </tr>
                    </table>
                    <table  style="width:90%;margin-right:auto;margin-left:auto">
                    <hr>

                    <tr>
                    <th>Recived From :</th>
                    <th>{{$costList->beneficiary}}</th>
                    
                    <th><h5>اصرفو للسيد/السادة</h5></th>
                  </tr>

                  <tr>
                    <th>Ammount :</th>
                    <th><span>{{$costList->amount}}</span><span>ٍريال</span></th>
                    <th><h5>مبلغ و قدره</h5></th>
                    
                  </tr>

                  <tr>
                    <th>And that for :</th>
                    <th>{{$costList->note}}</th>
                    <th><h5>وذلك مقابل</h5></th>
                    
                  </tr>

                  <tr>
                    <th>Payment Method :	</th>
                    <th>{{$costList->paymentType}}</th>
                    <th><h5>طريقة الدفع او السداد</h5></th>
                    
                  </tr>

                  @if($costList->paymentType == 'transfer')

                  <tr>
                    <th>Bank Name :	</th>
                    <th>{{$costList->bankName}}</th>
                    <th><h5>اسم البنك</h5></th>
                    
                  </tr> 
                  <tr>
                    <th>Bank Account number :	</th>
                    <th>{{$costList->pay_no}}</th>
                    <th><h5>رقم الحساب</h5></th>
                    
                  </tr>  
                  <tr>
                    <th>Document Date :	</th>
                    <th>{{$costList->pay_no}}</th>
                    <th><h5>تاريخ التحويل</h5></th>
                    
                  </tr> 
                  <tr>
                    <th >Accountant :	</th>
                    <th>{{$costList->admin->name}}</th>
                    <th ><h5>المحاسب</h5></th>
                    
                  </tr> 


                  @endif

                  @if($costList->paymentType == 'cheque')

                    <tr>
                      <th>Bank Name :	</th>
                      <th>{{$costList->bankName}}</th>
                      <th><h5>اسم البنك</h5></th>
                      
                    </tr> 
                    <tr>
                      <th>cheque number :	</th>
                      <th>{{$costList->pay_no}}</th>
                      <th><h5>رقم الشيك</h5></th>
                      
                    </tr>  
                    <tr>
                      <th>Document Date :	</th>
                      <th>{{$costList->pay_no}}</th>
                      <th><h5>تاريخ الشيك</h5></th>
                      
                    </tr> 
                    <tr>
                      <th >Accountant :	</th>
                      <th>{{$costList->admin->name}}</th>
                      <th ><h5>المحاسب</h5></th>
                      
                    </tr> 


                    @endif
                  </table>
                  <hr>
                  <table style="width:80%;margin-right:auto;margin-left:auto">
                  <tr>
                  <th>Riyadh - Exit.18 - AL-Da'ri Ind. Tel.:4715947</th>
                  <th><h5 style="text-align: right;margin-right: 10px;">الرياض - مخرج ١٨ - صناعية الدائري - هاتف :٤٧١٥٩٤٧</h5></th>
                  </tr>
                  
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
