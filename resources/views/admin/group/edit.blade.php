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
            {{ trans('site.EditGroupPermissions') }}
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
                        <h3 class="box-title"></h3>
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
                                <h3 class="box-title"></h3>
                            </div> -->
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('group.update' ,$group->group_id)}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- text input -->
                                    <div class="from-group">
                                        <label>{{ trans('site.Name') }}</label>
                                        <div class="controls">
                                            <input name="group_name" id="" value="{{$group->group_name}}" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> {{ trans('site.permissions') }}</label>
                                        <div class="controls">
                                            @foreach($roles as $controller=> $role)
                                            <h5>{{$controller}}</h5>
                                            <!-- <br /> -->
                                            @foreach($role as $i => $r)

                                            @if(in_array($r->role_id, $roleIds))
                                            <input type="checkbox" name="role_id[{{$r->role_id}}]" value="{{$r->role_id}}" checked>
                                            @else
                                            <input type="checkbox" name="role_id[{{$r->role_id}}]" value="{{$r->role_id}}">
                                            @endif
                                            {{$r->role_label}}
                                            <br />

                                            @endforeach
                                            <br />

                                            @endforeach
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="{{ trans('site.Edit') }}">

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