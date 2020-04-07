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
  $(document).ready(function() {
    $(".approve").click(function(event) {
      if (!confirm('هل انت متاكد ؟'))
        event.preventDefault();
    });
    $(".denied").click(function(event) {
      if (!confirm('هل انت متاكد ؟'))
        event.preventDefault();
    });

  });
</script>
@endsection

@section('content')
<div class="content-wrapper">
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
          <div id='printMe'>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Repair Card</h3>

                  <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Car</th>
                        <td>{{$repairCard->car->model}}</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Client</th>
                        <td>{{$repairCard->client->fullName}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Status</th>
                        <td>{{$repairCard->status}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Check Report</th>
                        <td>{{$repairCard->checkReprort}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-header -->
              </div>
              <!-- /.box-body -->

            </div>

            <div class="box-body">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Items</h3>

                  <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Service</th>
                        <th scope="row">Client Cost</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $total = 0; ?>
                      @foreach($repairCard->items as $item )

                      <tr>
                        <td>{{$item->service->service_name}}</td>
                        <td>{{$item->service_client_cost}}</td>
                      </tr>
                      <?php $total += $item->service_client_cost ?>
                      @endforeach
                      <tr>
                      <tr>
                        <th>Total</th>
                        <td><?php echo $total ?></td>
                      </tr>
                      <tr>
                        <?php $taxes = $repairCard->card_taxes / 100 ?>
                        <?php $totalWithTaxes = $total + ($taxes * $total); ?>
                        <th>Total With Taxes</th>
                        <td><?php echo $totalWithTaxes ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-header -->
              </div>
              <!-- /.box-body -->
            </div>
          </div>

          <td><a class="btn btn-danger denied" href="{{route('denied' ,$repairCard->id)}}"> denied</a></td>
          <td><a class="btn btn-primary approve" href="{{route('approved' ,$repairCard->id)}}"> Approve</a></td>
          <button class="btn bg-navy margin" onclick="printDiv('printMe')" style="text-align:center">Print</button>
          <td><a class="btn btn-warning"> Send Mail</a></td>




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
<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

  }
</script>
@endsection