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
select{
  width:200px;
}
</style>
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
<script>
$(document).ready(function(){

 $('#clients').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    method:"POST",
    url: "{{ route('get_car') }}",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result, date)
    {
     $('#cars').html(result);
    }

   })
  }
 });


 $('#more').click(function(){

   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    method:"get",
    url: "{{ route('newitem') }}",
    success:function(result, date)
    {
     $('#item').append(result);
    }

   })

 });


    $("#qty , #price , #tax").keyup(function(){
        var qty     = $('#qty').val();
        var price   = $('#price').val();
        var tax     = $('#tax').val();
        var dtitle  = $('#subtotal').val();
        var subtotal = qty * price ;
        var total = dtitle * tax ;

        $('#total').val(total + subtotal);
        $('#subtotal').val(subtotal);
        $('#tex_totle').val(total);
        // tex_totle
        console.log(total);
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
              <h3 class="box-title">{{ trans('site.approvedRepairCar') }}</h3>
              <div class="box-tools pull-right">
              <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>

                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>{{__('site.itemName')}}</th>
                    <th>{{__('site.qty')}}</th>
                    <th>{{__('site.price')}}</th>
                    <th>{{__('site.subTotal')}}</th>
                    <th>{{__('site.total')}}</th>
                    <th>{{__('site.tax')}}</th>
                    <th>{{__('site.Actions')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($account as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->ItemName}}</td>
                        <td>{{ $item->qty}}</td>
                        <td>{{ $item->price}}</td>
                        <td>{{ $item->subTotal}}</td>
                        <td>{{ $item->total}}</td>
                        <td>{{ $item->tax}}</td>
                        <td>
                            <form action="{{route('Accounting.destroy' ,$item->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

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
      <div class="modal-body box box-primary">
            <form action="{{ route('accept')}}" method="POST">
              @csrf
              @method('POST')
                <div class="row">
                            <input type="hidden" class="form-control" name="client_id"  value='{{$client->id}}' placeholder="" id="">
                            <input type="hidden" class="form-control" name="reprairCard_id"  value='{{$Card->id}}' placeholder="" id="">
                            <input type="hidden" class="form-control" name="car_id"  value='{{$car->id}}' placeholder="" id="">
                            <input type="hidden" class="form-control" name="tex_totle"  value='' placeholder="" id="tex_totle">

                    @include('admin.repairCard.item')

                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{__('site.add')}}</button>
                    </div>
                </div>

                <!-- </div> -->

            </div>


            </form>
      </div>

    </div>
  </div>
</div>
@endsection
@section('script')

@endsection
