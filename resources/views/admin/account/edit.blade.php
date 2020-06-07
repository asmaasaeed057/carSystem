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
            {{ trans('site.editAccount') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('site.home') }}</a></li>
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
                        <!-- <h3 class="box-title">{{ trans('site.Dashboard') }}</h3> -->
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- <div class="box box-warning"> -->
                        <!-- <div class="box-header with-border">
                                <h3 class="box-title">{{ trans('site.createClient') }}</h3>
                            </div> -->
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('admin.update' ,$user->id)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>{{ trans('site.group') }}</label>
                                    <div class="controls">
                                        <select class="" name="group_id">
                                            @foreach($groups as $group)
                                            <option value="{{ $group->group_id }}" {{($group->group_id == $user->group_id) ? 'selected' : '' }}>
                                                {{ $group->group_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- text input -->
                                <div class="form-group">
                                    <label>{{ trans('site.name') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('site.email') }}</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                                </div>


                                <input type="submit" class="btn btn-primary" value="{{ trans('site.update') }}">

                            </form>
                        </div>












                        <!-- /.box-body -->
                        <!-- </div> -->
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