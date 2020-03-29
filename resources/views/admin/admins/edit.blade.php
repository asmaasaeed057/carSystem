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
                <h3 class="box-title">{{ trans('site.addAdmin') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ route('admin.update' ,$client->id)}}" method="POST">
              @csrf
              @method('PUT')
  <!-- text input -->
  <div class="form-group">
                  <label>{{ trans('site.name_admin') }}</label>
                  <input type="text"name="name" class="form-control" placeholder="{{ trans('site.hintname_admin') }}" value="{{$client->name}}">
                </div>

                <div class="form-group">
                  <label>{{ trans('site.email_admin') }}</label>
                  <input type="email" name="email" class="form-control" placeholder="{{ trans('site.hintEmail_admin') }}" value="{{$client->email}}" >
                </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>{{ trans('site.password_admin') }}</label>
                  <input type="password" name="password" class="form-control" placeholder="{{ trans('site.hintpassword_admin') }}" value="">
                </div>

                <div class="form-group">
                    <label>{{__('site.group_id')}}</label>
                    <select class="form-control select2" id="group_id" name="group_id" style="width: 100%;">
                        @foreach(App\AdminGroup::get() as $value)
                            <option value="{{$value->id}}" {{ $client->group_id == $value->id ? "selected" : "" }}>{{$value->name_ar}}</option>
                        @endforeach
                    </select>
                </div>
  <br><br>
                <input type="submit" class="btn btn-info" value="{{ trans('site.update') }}">

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
