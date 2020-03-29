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
        {{ trans('site.showClient') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ trans('site.Dashboard') }}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    @include('layouts.error')
    <style>
      th{
        width:40%;
      }

        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
           
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
          font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
          display: none;
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
        }
    </style>
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
            
  
                <!--  -->
                <table class="table table-bordered" id="example1">
                <tbody>
                <tr>
                  <td><h4>{{ trans('site.clientName') }}</h4><p>{{$client->fullName}}</p></td>
                  
                  <td><h4>{{ trans('site.phone') }}</h4><p>{{$client->phone}}</p></td>
                  <td ><h4>{{ trans('site.address') }}</h4><p>{{$client->address}}</p></td>
                  <td ><h4>{{ trans('site.email') }}</h4><p>{{$client->email}}</p></td>
                  
                </tr>
              </tbody></table>
              <br>
              <div class="table">
                <button class="btn btn-danger">{{ trans('site.TotalCars') }}: </button>
                <button class="btn btn-danger">{{ trans('site.TotalRepaircard') }}: </button>
                <button class="btn btn-danger">{{ trans('site.Totalbills') }}: </button>
                <button class="btn btn-danger">{{ trans('site.Totaldebit') }}: </button>
                
              </div>
                <!--  -->
            <br>
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')">{{ trans('site.carList') }}</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')"> {{ trans('site.RepairCard') }}</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')"> {{ trans('site.bills') }}</button>
              </div>

              <div id="London" class="tabcontent">
                <h3>{{ trans('site.carList') }}</h3>
                <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th style="width:20%;">{{ trans('site.carCat') }}</th>
                  <th style="width:20%;">{{ trans('site.model') }}</th>
                  <th style="width:10%;">{{ trans('site.plate') }}</th>
                  <th style="width:20%;">{{ trans('site.created_at') }}</th>
                 
                </tr>
                </thead>
                <tbody>

                @foreach($cars as $value)
                <tr >
                  <td style="width:20%;">{{$value->carCatogray->name_en}}</td> 
                  <td style="width:20%;">{{$value->model}}</td>
                  <td style="width:10%;">{{$value->platNo}}</td>
                  <td style="width:20%;">{{$value->created_at->toDateString()}}</td>
                </tr>
                @endforeach
                </tbody>
    
                </table>
       
              </div>

              
              <div id="Paris" class="tabcontent">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:20%;">{{ trans('site.carName') }}</th>
                  <th style="width:10%;">{{ trans('site.plate') }}</th>
                  <th style="width:20%;">{{ trans('site.model') }}</th>

                  <th style="width:15%;">{{ trans('site.companyName_en') }}</th>
                  <th style="width:15%;">{{ trans('site.status') }}</th>
                   <th style="width:20%;">{{ trans('site.Actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($repairCards as $value)
                <tr>
                  <td style="width:20%;">{{$value->car->carCatogray->name_en}}</td>    <!-- fromCarTable -->
                  <td style="width:10%;">{{$value->car->platNo}}</td>    <!-- /// -->
                  <td style="width:20%;">{{$value->car->model}}</td>    <!-- /// -->

                  <td  style="width:15%;"> {{$value->car->carCatogray->company->name_en}}</td>    <!-- /// -->
                  <td  style="width:15%;"><button style="width:100%" class="btn btn-primary">{{$value->status}}</button></td>    <!-- /// -->

                  <td  style="width:20%;"><a href="{{route('reprairCard.show' ,$value->id)}}"><i class="fas fa-search"></i> </a> | <a href=""><i class="fas fa-edit"></i></a> </td>
                </tr>
                @endforeach
                </tbody>

              </table>
       
              </div>

              <div id="Tokyo" class="tabcontent">
                <h3>bills</h3>
                <p>Tokyo is the capital of Japan.</p>
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

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
@endsection
