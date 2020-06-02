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


            <div id="company" class='container' hidden>

              <a><b>Address:</b></a>{{ $company->company_address }}

              <div align="center">

                <img src="{{asset('/company_images')}}/{{ $company->company_logo }}" width="50" height="50">
                <a><b>{{ $company->company_name }}</b></a>
              </div>

              <a><b>phones:</b></a>{{ $company->company_phone }}


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Repair Card</h3>

                  <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                      </tr>
                    </thead>
                    <tbody>
                      <tr scope="row">
                        <th>Client Name</th>
                        <td>{{$repairCard->client->fullName}}</td>
                        <th>Client Email</th>
                        <td>{{$repairCard->client->email}}</td>
                      </tr>

                      <tr scope="row">
                        <th>Client Phone</th>
                        <td>{{$repairCard->client->phone}}</td>
                        <th>Status</th>
                        <td>{{$repairCard->status}}</td>
                      </tr>


                      <tr scope="row">
                        <th>Car</th>
                        <td>{{$repairCard->car->model}}</td>
                        <th>Technical Employee</th>
                        <td>{{$repairCard->employee->employee_name}}</td>
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
                        <th scope="col">Service Type</th>

                        <th scope="col">Service</th>
                        <th scope="row">Client Cost</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $total = 0; ?>
                      @foreach($repairCard->items as $item )

                      <tr>
                        <td>
                          @if($item->service->service_type =="1")
                          أجور خدمات اليد -الإصلاحات

                          @elseif($item->service->service_type =="2")
                          أجور الأعمال الخارجية
                          @elseif($item->service->service_type =="3")
                          قطع الغيار -مخزن داخلي
                          @elseif($item->service->service_type =="4")
                          قطع غيار -مشتريات خارجية
                          @endif
                        </td>
                        <td>{{$item->service->service_name}}</td>
                        <td>{{$item->service_client_cost}}</td>
                      </tr>
                      <?php $total += $item->service_client_cost ?>
                      @endforeach
                      <tr>
                        <th></th>
                        <th>Total</th>
                        <td><?php echo $total ?></td>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Discount</th>
                        <td>{{$repairCard->card_discount}}</td>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Taxes</th>
                        <td>{{$repairCard->taxes}}</td>
                      </tr>


                      <tr>
                        <th></th>

                        <th>Total With Taxes</th>
                        <td>{{$repairCard->total_with_taxes}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-header -->
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <div id='printMe2' hidden>


            <div id="company" class='container' hidden>

              <a><b>Address:</b></a>{{ $company->company_address }}

              <div align="center">

                <img src="{{asset('/company_images')}}/{{ $company->company_logo }}" width="50" height="50">
                <a><b>{{ $company->company_name }}</b></a>
              </div>

              <a><b>phones:</b></a>{{ $company->company_phone }}


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box">
                <div class="box-header with-border">
                  <h3 style="float:left" class="box-title">Repair Card</h3>
                  <h3 id="quotation" style="text-align: center;" hidden>عرض سعر</h3>

                  <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                      </tr>
                    </thead>
                    <tbody>
                      <tr scope="row">
                        <th>Client Name</th>
                        <td>{{$repairCard->client->fullName}}</td>
                        <th>Client Email</th>
                        <td>{{$repairCard->client->email}}</td>
                      </tr>

                      <tr scope="row">
                        <th>Client Phone</th>
                        <td>{{$repairCard->client->phone}}</td>
                        <th>Status</th>
                        <td>{{$repairCard->status}}</td>
                      </tr>


                      <tr scope="row">
                        <th>Car</th>
                        <td>{{$repairCard->car->model}}</td>
                        <th>Technical Employee</th>
                        <td>{{$repairCard->employee->employee_name}}</td>
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
                        <th scope="col">Service Type</th>

                        <th scope="col">Service</th>
                        <th scope="row">Client Cost</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $total = 0; ?>
                      @foreach($repairCard->items as $item )

                      <tr>
                        <td>
                          @if($item->service->service_type =="1")
                          أجور خدمات اليد -الإصلاحات

                          @elseif($item->service->service_type =="2")
                          أجور الأعمال الخارجية
                          @elseif($item->service->service_type =="3")
                          قطع الغيار -مخزن داخلي
                          @elseif($item->service->service_type =="4")
                          قطع غيار -مشتريات خارجية
                          @endif
                        </td>
                        <td>{{$item->service->service_name}}</td>
                        <td>{{$item->service_client_cost}}</td>
                      </tr>
                      <?php $total += $item->service_client_cost ?>
                      @endforeach
                      <tr>
                        <th></th>
                        <th>Total</th>
                        <td><?php echo $total ?></td>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Discount</th>
                        <td>{{$repairCard->card_discount}}</td>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Taxes</th>
                        <td>{{$repairCard->taxes}}</td>
                      </tr>


                      <tr>
                        <th></th>

                        <th>Total With Taxes</th>
                        <td>{{$repairCard->total_with_taxes}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-header -->
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          @if($repairCard->status =="denied" || $repairCard->status =="accepted")
          @else

          <td><a class="btn btn-danger denied" href="{{route('denied' ,$repairCard->id)}}"> denied</a></td>
          <td><a class="btn btn-primary approve" href="{{route('approved' ,$repairCard->id)}}"> Approve</a></td>
          @endif
          <button class="btn bg-navy margin" onclick="printDiv('printMe')" style="text-align:center">Print</button>
          <!-- <td><a class="btn btn-warning"> Send Mail</a></td> -->
          <td><a href="mailto:{{$repairCard->client->email}}?subject=Repair Card Price" target="_top" class="btn btn-warning">Send Mail</a></td>
          <button class="btn bg-primary margin" onclick="printDiv('printMe2')" style="text-align:center">Quotation</button>




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
    $('#company').show();
    $('#quotation').show();
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

  }
</script>
@endsection