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
                <form action="{{ route('client.store')}}" method="POST">
                  @csrf
                  @method('POST')

                  <!-- text input -->
                  <div class="form-group">
                    <label>{{ trans('site.clientName') }}</label>
                    <input type="text" name="fullName" class="form-control" placeholder="{{ trans('site.hintClientName') }}">
                    @if ($errors->get('fullName'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('fullName') as $fullName)
                      {{ $fullName }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>{{ trans('site.phone') }}</label>
                    <input type="text" name="phone" class="form-control" placeholder="{{ trans('site.hintPhone') }}">
                    @if ($errors->get('phone'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('phone') as $phone)
                      {{ $phone }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>{{ trans('site.address') }}</label>
                    <input type="text" name="address" class="form-control" placeholder="{{ trans('site.hintAddress') }}">
                    @if ($errors->get('address'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('address') as $address)
                      {{ $address }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>{{ trans('site.email') }}</label>
                    <input type="email" name="email" class="form-control" placeholder="{{ trans('site.hintEmail') }}">
                    @if ($errors->get('email'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('email') as $email)
                      {{ $email }}
                      @endforeach
                    </span>
                    @endif
                  </div>
                  <div class="hidden">
                    <input size="60" maxlength="120" name="client_type" value="contract" id="" type="text" style="height:20px; width: 220px; float: right;" />

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