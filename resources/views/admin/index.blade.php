@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{trans('site.Dashboard')}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('site.home')}}</a></li>
      <li class="active">{{trans('site.Dashboard')}}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner" style="height: 113px">
            <p>{{trans('site.todayClients')}}: &nbsp;<span style="font-weight:bold">{{$todayConractClients}}</span> </p>
            <br>
            <p>{{trans('site.totalClients')}} &nbsp;<span style="font-weight:bold">{{$totalContractClients}}</span> </p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>

          <a class="small-box-footer">{{trans('site.clients')}}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">

          <div class="inner" style="height: 113px">
            <p>{{trans('site.todayCars')}}: &nbsp;<span style="font-weight:bold">{{$todayCars}}</span> </p>
            <p>{{trans('site.totalCars')}}: &nbsp;<span style="font-weight:bold">{{$totalCars}}</span> </p>
            <p>{{trans('site.carsUnderMaintenance')}}: &nbsp;<span style="font-weight:bold">{{$totalAcceptedCars}}</span> </p>
          </div>
          <div class="icon">
            <i class="ion ion-android-car"></i>
          </div>
          <a class="small-box-footer">{{trans('site.cars')}} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- ./col -->
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-purple">

          <div class="inner" style="height: 113px">
            <p>{{trans('site.acceptedCards')}} : &nbsp;<span style="font-weight:bold">{{$totalAcceptedCards}}</span> </p>
            <p>{{trans('site.pandingCards')}}: &nbsp;<span style="font-weight:bold">{{$totalPandingCards}}</span> </p>
            <p>{{trans('site.deniedCards')}}: &nbsp;<span style="font-weight:bold">{{$totalDeniedCards}}</span> </p>
          </div>

          <div class="icon">
            <i class="ion ion-card"></i>
          </div>
          <a class="small-box-footer">{{trans('site.repairCards')}}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-blue">

          <div class="inner" style="height: 113px">
            <p>{{trans('site.todayExpenses')}} : &nbsp;<span style="font-weight:bold">{{$todayExpenses}}</span> </p>
            <br>
            <p>{{trans('site.totalExpense')}}: &nbsp;<span style="font-weight:bold">{{$totalExpenses}}</span> </p>
          </div>

          <div class="icon">
            <i class="ion ion-share"></i>
          </div>
          <a class="small-box-footer">{{trans('site.Expenses')}}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>


    <!-- ./col -->

    <div class="row">

      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner" style="height: 113px">
            <p>{{trans('site.todayCont')}}: &nbsp;<span style="font-weight:bold">{{$contractPayments}}</span> </p>
            <p>{{trans('site.todayNoneCont')}}: &nbsp;<span style="font-weight:bold">{{$noneContractPayments}}</span> </p>
            <p>{{trans('site.todayTotal')}}: &nbsp;<span style="font-weight:bold">{{$contractPayments + $noneContractPayments}} </span> </p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a class="small-box-footer">{{trans('site.payments')}}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner" style="height: 113px">
            <p>{{trans('site.todayRemain')}} : &nbsp;<span style="font-weight:bold">{{$todayRemainContract}}</span> </p>
            <br>
            <p>{{trans('site.totalRemain')}}: &nbsp;<span style="font-weight:bold">{{$totalRemainContract}}</span> </p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <a class="small-box-footer">{{trans('site.debts')}}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
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
        animation: fadeEffect 1 s; /* Fading effect takes 1 second */
      }

      /* Go from zero to full opacity */
      @keyframes fadeEffect {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }
    </script>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->

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