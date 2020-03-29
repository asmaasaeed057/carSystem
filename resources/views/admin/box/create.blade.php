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
    <style>
    .border{
      text-align: center;
      /* border: 1px solid; */
    }
    .td{
      /* border-right: 1px solid; */
    }

    </style>
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                    <td>{{$value->car->carCatogray->name_en}}</td>
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
                <table style="" class="table table-striped">

                <tr >
                <th class="border">s.No:</th>
                <th class="border">description</th>
                <th class="border">Rate</th>
                <th class="border">Qty</th>
                <th class="border">Total</th>
                </tr>

                @foreach($accounts as $value )
                <tr style="text-align: center;margin-top:5px;">
                <td class="td">{{$value->id}}</td>
                <td class="td">{{$value->ItemName}}</td>
                <td class="td">{{$value->price}}</td>
                <td class="td">{{$value->qty}}</td>
                <td class="td">{{$value->subTotal}}</td>
                </tr>
                @endforeach

                </table>
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
            </div>

            <div class="row no-print">
        <div class="col-xs-12">

          <a href="{{ route('print' , request()->route()->parameter('Accounting')) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> -->

          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
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

  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">اضافة</h5>
      </div>
      <div class="modal-body">
        <nav>
            <div>
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="active">
                        <a class=" nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="nav-home" aria-selected="true">
                        <i class="fa fa-coins"></i>

                        Cache
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <i class="fa fa-credit-card"></i>
                        Bank Transfer

                        </a>

                    </li>
                    <li class="">
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="nav-contact" aria-selected="false">
                        <i class="fa fa-copy"></i>
                        Bank Check
                        </a>

                    </li>
                </ul>

            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade active in " id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                <br />
                <div class="text-center">
                    <h2> {{ $subTotal + $tax  }} </h2>
                    <span class="text-center">ريال سعودى</span>
                </div>

                <div>
                    <form action="{{ route('money')}}" method="POST">
                    @csrf
                    @method('POST')
                        <input type="hidden" class="form-control" name="reprairCard_id"  value='{{ request()->route('Accounting') }}' placeholder="" id="reprairCard_id">
                        <input type="hidden" class="form-control" name="type"  value='Cache' placeholder="" id="type">
                        <input type="hidden" class="form-control" name="tax"  value='{{ $tax }}' placeholder="" >

                        <div class="row">
                            <input type="hidden" class="form-control" name="tex_totle"  value='{{ $subTotal + $tax  }}' placeholder="" id="tex_totle">
                            <div class="col-md-12 " style="display: flex; justify-content: center;">
                                <div class="form-group" style="    width: 55%;">
                                    <br />
                                    <!-- <label>ادخل المبلغ المطلوب</label> -->
                                    <input type="text" class="form-control" name="total" id="" value="{{ old('total') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">{{__('site.add')}}</button>
                            </div>
                        </div>
                    <!-- </div> -->
                    </form>
                </div>
            </div>
            <div class="tab-pane fade  " id="profile" role="tabpanel" aria-labelledby="nav-home-tab">
                <br />
                <div class="text-center">
                    <h2> {{ $subTotal + $tax  }} </h2>
                    <span class="text-center">ريال سعودى</span>
                </div>

                <div>
                    <form action="{{ route('money')}}" method="POST">
                    @csrf
                    @method('POST')
                        <input type="hidden" class="form-control" name="reprairCard_id"  value='{{ request()->route('Accounting') }}' placeholder="" id="reprairCard_id">
                        <input type="hidden" class="form-control" name="type"  value='Check' placeholder="" id="type">
                        <div class="row">
                            <input type="hidden" class="form-control" name="tax"  value='{{ $tax }}' placeholder="" >
                            <input type="hidden" class="form-control" name="tex_totle"  value='{{ $subTotal + $tax  }}' placeholder="" id="tex_totle">

                            <div class="col-md-6 " >
                                <div class="form-group" style="  ">
                                    <br />
                                    <label>المبلغ المدفوع</label>
                                    <input type="text" class="form-control" name="total" id="" value="{{ old('total') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>
                            <div class="col-md-6 " >
                                <div class="form-group" style="    ">
                                    <br />
                                    <label>رقم التحويلة</label>
                                    <input type="text" class="form-control" name="pay_no" id="" value="{{ old('pay_no') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>
                            <div class="col-md-6 " >
                                <div class="form-group" style="    ">
                                    <br />
                                    <label>اسم البنك </label>
                                    <input type="text" class="form-control" name="bankName" id="" value="{{ old('bankName') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group" style="    ">
                                    <br />
                                    <label>تاريخ الدفع</label>
                                    <input type="date" class="form-control" name="pay_date" id="" value="{{ old('pay_date') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">{{__('site.add')}}</button>
                            </div>
                        </div>
                    <!-- </div> -->
                    </form>
                </div>
            </div>
            <div class="tab-pane fade " id="messages" role="tabpanel" aria-labelledby="nav-home-tab">
                <br />
                <div class="text-center">
                    <h2> {{ $subTotal + $tax  }} </h2>
                    <span class="text-center">ريال سعودى</span>
                </div>

                <div>
                    <form action="{{ route('money')}}" method="POST">
                    @csrf
                    @method('POST')
                        <input type="hidden" class="form-control" name="reprairCard_id"  value='{{ request()->route('Accounting') }}' placeholder="" id="reprairCard_id">
                        <input type="hidden" class="form-control" name="type"  value='Transfer' placeholder="" id="type">
                        <input type="hidden" class="form-control" name="tax"  value='{{ $tax }}' placeholder="" >
                        <input type="hidden" class="form-control" name="tex_totle"  value='{{ $subTotal + $tax  }}' placeholder="" id="tex_totle">

                        <div class="row">

                            <div class="col-md-6 " >
                                <div class="form-group" style="  ">
                                    <br />
                                    <label>المبلغ المدفوع</label>
                                    <input type="text" class="form-control" name="total" id="" value="{{ old('total') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>
                            <div class="col-md-6 " >
                                <div class="form-group" style="    ">
                                    <br />
                                    <label>رقم التحويلة</label>
                                    <input type="text" class="form-control" name="pay_no" id="" value="{{ old('pay_no') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>
                            <div class="col-md-6 " >
                                <div class="form-group" style="    ">
                                    <br />
                                    <label>اسم البنك </label>
                                    <input type="text" class="form-control" name="bankName" id="" value="{{ old('bankName') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group" style="    ">
                                    <br />
                                    <label>تاريخ الدفع</label>
                                    <input type="date" class="form-control" name="pay_date" id="" value="{{ old('pay_date') }}" placeholder="ادخل المبلغ المطلوب">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">{{__('site.add')}}</button>
                            </div>
                        </div>
                    <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>


      </div>

    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  $(function () {
    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
  })

</script>
@endsection
