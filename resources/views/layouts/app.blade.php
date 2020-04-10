<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/Ionicons/css/ionicons.min.css">
    @yield('style')

    <!-- Theme style -->
    <!-- file en  -->
    @if (session('lang') == "ar")
    <!-- start rtl file -->
    <!-- <link rel="stylesheet" href="{{ asset('FrontEnd') }}/dist/css/AdminLTE_rtl.min.css"> -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/rtl/css/AdminLTE-rtl.css">
    <!-- end rtl file -->
    @else
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/dist/css/AdminLTE.min.css">
    @endif

    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/select2/dist/css/select2.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script> -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/dist/css/skins_rtl/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    @if (session()->has('lang') == "ar")

    <!-- file rtl -->
    <!-- <link rel="stylesheet" href="{{ asset('FrontEnd') }}/rtl/css/bootstrap-rtl.min.css"> -->
    <link rel="stylesheet" href="{{ asset('FrontEnd') }}/rtl/css/skins/_all-skins-rtl.min.css">
    @endif
    @yield('css')

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('FrontEnd') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('FrontEnd') }}/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('FrontEnd') }}/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('FrontEnd') }}/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('FrontEnd') }}/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><a href="{{ url('lang/ar') }}">العربية</a></li>
                                <li class="header"><a href="{{ url('lang/en') }}">English</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('FrontEnd') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ auth('admin')->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('FrontEnd') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">

                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('admin\logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('FrontEnd') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth('admin')->user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                        <a href="{{route('home')}}">
                            <i class="fa fa-dashboard"></i> <span>{{ trans('site.Dashboard')}}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.Client')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('client.index')}}"><i class="fa fa-circle-o"></i>{{ trans('site.showClient') }}</a></li>
                            <li><a href="{{ route('client.create')}}"><i class="fa fa-circle-o"></i> {{ trans('site.addClient') }}</a></li>
                            <!-- <li><a href="{{ route('noneContractClient.indexNoneContract')}}"><i class="fa fa-circle-o"></i> Show None Contract Client</a></li> -->
                            <li><a href="{{ route('noneContractClient.createNoneContractClient')}}"><i class="fa fa-circle-o"></i>Create None Contract Client</a></li>                            
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Cars</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('car.index')}}"><i class="fa fa-circle-o"></i>{{ trans('site.carList') }}</a></li>


                            <!-- <li><a href="{{ route('brandCategory.create')}}"><i class="fa fa-circle-o"></i>Add Car Brand Category</a></li> -->
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.RepairCard')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('reprairCard.index')}}"><i class="fa fa-circle-o"></i>{{ trans('site.repairCarList')}} </a></li>
                            <li><a href="{{ route('reprairCard.create')}}"><i class="fa fa-circle-o"></i>{{ trans('site.addRepairCar')}} </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.Reports')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('expenseReport')}}"><i class="fa fa-circle-o"></i> Expense Report</a></li>
                            <li><a href="{{ route('expenseTaxReport')}}"><i class="fa fa-circle-o"></i> Expense Tax Report</a></li>
                            <li><a href="{{ route('ClientReport')}}"><i class="fa fa-circle-o"></i>Client Report</a></li>
                            <li><a href="{{ route('cardTaxesReport')}}"><i class="fa fa-circle-o"></i> Card Tax Report</a></li>

                            
                            <li><a href="{{ url('admin/FilterIncome')}}"><i class="fa fa-circle-o"></i> {{ trans('site.income')}}</a></li>
                            <li><a href="{{ url('admin/FilterIncome')}}"><i class="fa fa-circle-o"></i> {{ trans('site.Expenses')}}</a></li>
                            <li><a href="{{ url('admin/FilterIncome')}}"><i class="fa fa-circle-o"></i> {{ trans('site.isDebit')}}</a></li>
                            <li><a href="{{ url('admin/FilterIncome')}}"><i class="fa fa-circle-o"></i> {{ trans('site.tax')}}</a></li>
                            <li><a href="{{ url('admin/FilterIncome')}}"><i class="fa fa-circle-o"></i> {{ trans('site.sumary')}}</a></li>


                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Service</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('service.index')}}"><i class="fa fa-circle-o"></i>Services</a></li>
                            <li><a href="{{ route('service.create')}}"><i class="fa fa-circle-o"></i>Add Service</a></li>
                        </ul>
                    </li>
                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Car Brand</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('brand.index')}}"><i class="fa fa-circle-o"></i>Car Brands</a></li>
                            <li><a href="{{ route('brand.create')}}"><i class="fa fa-circle-o"></i>Add Car Brand</a></li>
                        </ul>
                    </li> -->

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Expenses</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('expense.index')}}"><i class="fa fa-circle-o"></i>show expenses</a></li>
                            <li><a href="{{ route('expense.create')}}"><i class="fa fa-circle-o"></i> add expense</a></li>

                        </ul>
                    </li>

                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.car')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('car.index')}}"><i class="fa fa-circle-o"></i>{{ trans('site.carList') }}</a></li>
                            <li><a href="{{ route('car.create')}}"><i class="fa fa-circle-o"></i> {{ trans('site.addCar') }}</a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="treeview">

                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Car Type</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('carType.index')}}"><i class="fa fa-circle-o"></i>Car Types</a></li>
                            <li><a href="{{ route('carType.create')}}"><i class="fa fa-circle-o"></i>Add Car Type</a></li>
                        </ul>
                    </li> -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.box')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('box.index') }}"><i class="fa fa-circle-o"></i> {{ trans('site.getCash')}}</a></li>
                            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> {{ trans('site.cashList')}}</a></li>
                            <li><a href="{{ route('cost.index')}}"><i class="fa fa-circle-o"></i> {{ trans('site.Expenses')}}</a></li>
                            <li><a href="{{ route('cost.create')}}"><i class="fa fa-circle-o"></i> {{ trans('site.AddExpense')}}</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.Accounting')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('Accounting.index')}}"><i class="fa fa-circle-o"></i> {{ trans('site.invoiceList') }}</a></li>
                            <li><a href="{{ route('Accounting.create')}}"><i class="fa fa-circle-o"></i> {{ trans('site.addInvoiceList') }}</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.Administration')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.index') }}"><i class="fa fa-circle-o"></i> {{ trans('site.Administration')}}</a></li>
                            <li><a href="{{ route('admin.create') }}"><i class="fa fa-circle-o"></i> {{ trans('site.add')}}</a></li>
                        </ul>
                    </li>
                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.permissions')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('permission.index') }}"><i class="fa fa-circle-o"></i> {{ trans('site.permissionslist')}}</a></li>
                            <li><a href="{{ route('permission.create') }}"><i class="fa fa-circle-o"></i> {{ trans('site.add')}}</a></li>
                        </ul>
                    </li> -->

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ trans('site.setting')}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">


                            <li><a href="{{ route('brand.index')}}"><i class="fa fa-circle-o"></i>Car Brands</a></li>
                            <li><a href="{{ route('brandCategory.index')}}"><i class="fa fa-circle-o"></i>Car Brand Categories</a></li>
                            <li><a href="{{ route('carType.index')}}"><i class="fa fa-circle-o"></i>Car Types</a></li>

                            <!-- <li><span style="color:#fff">{{ trans('site.carCatogry') }}</h2>
                            </li>
                            
                            <li><a href="{{ route('carCategory.index')}}"><i class="fa fa-circle-o"></i>{{ trans('site.carCatogryList') }}</a></li>
                            <li><a href="{{ route('carCategory.create')}}"><i class="fa fa-circle-o"></i> {{ trans('site.addCarCatogry') }}</a></li>
                            <li><span style="color:#fff">{{trans('site.company')}}</span></li>
                            <li><a href="{{ route('company.index') }}"><i class="fa fa-circle-o"></i>{{ trans('site.companyList') }}</a></li>
                            <li><a href="{{ route('company.create')}}"><i class="fa fa-circle-o"></i> {{ trans('site.addCompany') }}</a></li>

                            <li><span style="color:#fff">{{trans('site.Cartype')}}</span></li>
                            <li><a href="{{ route('carType.index')}}"><i class="fa fa-circle-o"></i>{{ trans('site.carTypeList') }}</a></li>
                            <li><a href="{{ route('carType.create')}}"><i class="fa fa-circle-o"></i> {{ trans('site.addCarType') }}</a></li> -->

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Permissions</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('group.index') }}"><i class="fa fa-circle-o"></i> Groups</a></li>
                            <li><a href="{{ route('account.index') }}"><i class="fa fa-circle-o"></i> Accounts</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Operation Orders</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('operationOrder.index') }}"><i class="fa fa-circle-o"></i> Operation Orders</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> -->

    <!-- jQuery 3 -->
    <script src="{{ asset('FrontEnd') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('FrontEnd') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('FrontEnd') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('FrontEnd') }}/bower_components/raphael/raphael.min.js"></script>
    <script src="{{ asset('FrontEnd') }}/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('FrontEnd') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{ asset('FrontEnd') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('FrontEnd') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('FrontEnd') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    @yield('js')

    <script src="{{ asset('FrontEnd') }}/bower_components/moment/min/moment.min.js"></script>
    <script src="{{ asset('FrontEnd') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{ asset('FrontEnd') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('FrontEnd') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('FrontEnd') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('FrontEnd') }}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('FrontEnd') }}/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script src="{{ asset('FrontEnd') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('FrontEnd') }}/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('FrontEnd') }}/dist/js/demo.js"></script>


    <!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->

    <script>
        //   $(document).ready(function()})
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @yield('script')

</body>

</html>