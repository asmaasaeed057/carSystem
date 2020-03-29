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

 $('#country').change(function(){
  $('#state').val('');
  $('#city').val('');
 });

 $('#state').change(function(){
  $('#city').val('');
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

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.clientName')}}</label>
                        <select class="form-control select2" name="client_id"  id="clients" style="width: 100%;">
                        @foreach($clients as $value)
                            <option value="{{$value->id}}">{{$value->fullName}}</option>
                        @endforeach
                        </select>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.car')}}</label>
                        <select class="form-control select2" name="car_id" id="cars" style="width: 100%;">
                            @foreach($cars as $value)
                                <option value="{{$value->id}}">{{$value->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for=""><h4>{{ trans('site.addRepairCheck') }}</h4></label>
                    <textarea class="form-control" name="checkReprort" id="" cols="30" rows="10"></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">

                  </div>
            </div>
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
