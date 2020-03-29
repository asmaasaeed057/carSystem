@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$clientQty}}</h3>

              <p>{{ trans('site.clients') }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
            <a href="{{route('client.create')}}" class="small-box-footer">{{trans('site.createClient')}}<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$carsQtn}}<sup style="font-size: 20px"></sup></h3>

              <p>{{ trans('site.car')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('car.create')}}" class="small-box-footer">{{trans('site.addCar')}} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$repairCardQty}}</h3>

              <p> {{trans('site.RepairCard')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">{{trans('site.addRepairCar')}}<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$account}}</h3>

              <p>{{ trans('site.bills')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">{{trans('site.invoiceList')}}<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <style>
      .tab {
              overflow: hidden;
              border: 1px solid #ccc;
              background-color: #f1f1f1;
            }

            /* Style the buttons that are used to open the tab content */
            .tab button {
              background-color: inherit;
              float: left;
              border: none;
              outline: none;
              cursor: pointer;
              padding: 14px 16px;
              transition: 0.3s;
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
      <script>
              function openCity(evt, cityName) {
                  // Declare all variables
                  var i, tabcontent, tablinks;

                  // Get all elements with class="tabcontent" and hide them
                  tabcontent = document.getElementsByClassName("tabcontent");
                  for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                  }

                  // Get all elements with class="tablinks" and remove the class "active"
                  tablinks = document.getElementsByClassName("tablinks");
                  for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                  }

                  // Show the current tab, and add an "active" class to the button that opened the tab
                  document.getElementById(cityName).style.display = "block";
                  evt.currentTarget.className += " active";
                }
                      </script>
                      <script>
                      
                      .tabcontent {
                  animation: fadeEffect 1s; /* Fading effect takes 1 second */
                }

                /* Go from zero to full opacity */
                @keyframes fadeEffect {
                  from {opacity: 0;}
                  to {opacity: 1;}
                }
</script>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-11 OFF connectedSortable" >
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')">{{ trans('site.clientList') }}</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">{{ trans('site.invoice') }}</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
            </div>

            <!-- Tab content -->
            <div id="London" class="tabcontent">
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('site.clientList') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th>{{ trans('site.clientName') }} </th>
                  <th>{{ trans('site.phone') }} </th>
                  <th>{{trans('site.address')}}</th>
                  <th style="width: 80px">{{trans('site.created_at')}}</th>
                </tr>
              @foreach($clients as $value)
                <tr>
                  <td>{{$value->fullName}}</td>
                  <td>{{$value->phone}}</td>
                  <td>{{$value->address}}</td>
                  <td style="width: 80px">{{$value->created_at}}</td>
                </tr>
              @endforeach 
              </tbody></table>
            </div>
            <!-- /.box-body -->
           
          </div>
            </div>

            <div id="Paris" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p> 
            </div>

            <div id="Tokyo" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
          </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
            </section>
            <!-- right col -->
          </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
@endsection
