@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{ asset('FrontEnd') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('script')
<!-- DataTables -->
<script src="https://kit.fontawesome.com/c099210540.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
            {{ trans('site.BrandCategory') }}
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
                    <div class="box-header">
                        <a href="{{route('brand.create')}}" style="margin-top: 10px;" class="btn btn-success"><i class="fa fa-plus" style="margin-right: 10px;" ></i>{{ trans('site.add') }} </a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('site.NameEn') }}</th>
                                    <th>{{ trans('site.NameAr') }}</th>
                                    <th>{{ trans('site.Edit') }}</th>
                                    <th>{{ trans('site.Delete') }}</th>
                                    <th>{{ trans('site.Show') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->name_en}}</td>
                                    <td>{{$brand->name_ar}}</td>

                                    <td><a href="{{route('brand.edit' ,$brand->id)}}" class="btn btn-info"><i class="fa fa-edit" style="margin-right: 10px;" ></i>{{ trans('site.Edit') }}</a></td>
                                    <td>

                                        <form class="delete" action="{{route('brand.destroy' ,$brand->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" style="margin-right: 10px;" ></i>{{ trans('site.Delete') }}</button>

                                        </form>
                                    </td>
                                    <td><a href="{{route('brand.show' ,$brand->id)}}" class="btn btn-success"><i class="fa fa-search" style="margin-right: 10px;" ></i>{{ trans('site.Show') }}</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    $(document).ready(function() {
        $(".delete").click(function(event) {
            if (!confirm('هل انت متاكد ؟'))
                event.preventDefault();
        });
    });
</script>
@endsection