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
                <form action="{{ route('carType.store')}}" method="POST">
                  @csrf
                  @method('POST')

                  <!-- text input -->
                  <div class="form-group">
                    <label>Car Type Name (Arabic)</label>
                    <input type="text" name="name_ar" class="form-control" placeholder="Car Type Name">
                    @if ($errors->get('name_ar'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('name_ar') as $name_ar)
                      {{ $name_ar }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Car Type Name (English)</label>
                    <input type="text" name="name_en" class="form-control" placeholder="Car Type Name">
                    @if ($errors->get('name_en'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('name_en') as $name_en)
                      {{ $name_en }}
                      @endforeach
                    </span>
                    @endif
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
@endsection