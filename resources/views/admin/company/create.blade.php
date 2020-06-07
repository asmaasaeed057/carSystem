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
  function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }

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
      {{ trans('site.Dashboard') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('site.home') }}</a></li>
      <li class="active">{{ trans('site.Dashboard') }}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

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
                <h3 class="box-title">Create Company Details</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form action="{{ route('companyDetails.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('POST')

                  <!-- text input -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{old('company_name')}}" name="company_name" class="form-control" placeholder="Name">
                    @if ($errors->first('company_name'))
                    <li>
                    {{ $errors->first('company_name')  }}
                  </li>
                    @endif

                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="company_phone" class="form-control" placeholder="Phone" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="company_address" class="form-control" placeholder="Phone" required>
                  </div>
                  <div class="form-group">
                    <label>Notes</label>
                    <textarea class="form-control" name="company_notes" id="" cols="30" rows="10"></textarea>
                  </div>
                 <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="company_logo" onchange="loadPreview(this);" >

                    <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150"/>
                </div>




                  <input type="submit" class="btn-primary" value="{{ trans('site.add') }}">

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