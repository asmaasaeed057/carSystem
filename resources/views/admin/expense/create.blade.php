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
                <h3 class="box-title">Create Expense</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form action="{{ route('expense.store')}}" method="POST">
                  @csrf
                  @method('POST')

                  <!-- text input -->
                  <div class="form-group">
                    <label>Expense Name</label>
                    <input type="text" name="expense_name" class="form-control" placeholder="expense name">
                    @if ($errors->get('expense_name'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('expense_name') as $expense_name)
                      {{ $expense_name }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Expense Bill</label>
                    <input type="text" name="expense_bill" class="form-control" placeholder="expense bill">
                    @if ($errors->get('expense_bill'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('expense_bill') as $expense_bill)
                      {{ $expense_bill }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Expense Price</label>
                    <input type="text" name="expense_price" class="form-control" placeholder="expense price">
                    @if ($errors->get('expense_price'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('expense_price') as $expense_price)
                      {{ $expense_price }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>EXpense Tax</label>
                    <input type="text" name="expense_tax" class="form-control" placeholder="expense tax">
                    @if ($errors->get('expense_tax'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('expense_tax') as $expense_tax)
                      {{ $expense_tax }}
                      @endforeach
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>EXpense Notes</label>
                    <textarea class="form-control" name="expense_notes" id="" cols="30" rows="10"></textarea>
                    @if ($errors->get('expense_notes'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('expense_notes') as $expense_notes)
                      {{ $expense_notes }}
                      @endforeach
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>EXpense date</label>
                    <input type="date" name="expense_date" class="form-control" placeholder="expense date">
                    @if ($errors->get('expense_date'))
                    <span for="textfield" class="help-block error" style="color:firebrick">
                      @foreach ($errors->get('expense_date') as $expense_date)
                      {{ $expense_date }}
                      @endforeach
                    </span>
                    @endif
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