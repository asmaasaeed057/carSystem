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
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ trans('site.EditBillNotes') }}
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
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- <div class="box box-warning"> -->
              <!-- <div class="box-header with-border">
                <h3 class="box-title"></h3>
              </div> -->
              <!-- /.box-header -->
              <div class="box-body">
                <form action="{{ route('note.update',$note->bill_note_id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">

               
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('site.BillNotesEn') }}</label>
                        <textarea class="form-control" name="bill_note_desc_en" id="" cols="30" rows="10">{{$note->bill_note_desc_en}}</textarea>

                      </div>
                    </div>
                 
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('site.BillNotesAr') }}</label>
                        <textarea class="form-control" name="bill_note_desc_ar" id="" cols="30" rows="10">{{$note->bill_note_desc_ar}}</textarea>
                      </div>
                    </div>
                 

                  </div>
              </div>


              <input type="submit" class="btn  btn-info " value="{{ trans('site.Edit') }}">
              </form>
            <!-- </div> -->
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