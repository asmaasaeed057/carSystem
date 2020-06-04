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
<style>
    select {
        width: 200px;
    }
</style>

<script>
    var j = 1;
    $(document).ready(function() {
        changeClient();
        changeService(0);
        //////$('#service_type_0').select2();

        showPrice(0);
        $('.add').click(function() {
            addRow();
        });
    });


    function addRow() {
        var i = j++;

        var tr =
            '<tr>' +
            '<td><select class="form-control" name="service_type[' + i + ']" id="service_type_' + i + '" onchange="changeService(' + i + ')"><option value="">Select</option><option value="1">أجور خدمات اليد )الإصلاحات)</option><option value="2">أجور الأعمال الخارجية </option><option value="3">قطع الغيار )مخزن داخلي) </option><option value="4">قطع غيار )مشتريات خارجية) </option></select></td>' +
            '<td><select onchange="showPrice(' + i + ')" name="services[' + i + ']" id="services_' + i + '" class="form-control select2"><option value="">Select One</option></select></td>' +
            '<td><div class="form-group"><input type="text" name="price[' + i + ']" id="price_' + i + '"></td>' +
            '<td><input type="button" class="btn btn-green add" value="+" onclick="addRow()"><input type="button" class="btn btn-danger delete" value="x" onclick="removeItem(this,' + i + ')"></td>' +
            '</tr>'

        $('#services').append(tr);
        //  $('#service_type_'+i).select2();
    }

    function removeItem(e, count) {
        var total = $('#total_price').val();
        var price = $('#price_' + count).val();
        var total2 = Number(total) - Number(price);
        var discount = Number($('#discount').val());
        var totalWithDiscount = total2 - discount;
        var taxes = Number($('#taxes').val());
        var totalTaxes = (taxes * totalWithDiscount) / 100;
        var totalWithTaxes = Number(totalTaxes) + totalWithDiscount;
        $('#totalPriceWithTaxes').val(totalWithTaxes);

        $('#total_price').val(total2);
        if (confirm("هل أنت متأكد؟")) {
            $(e).parent().parent().remove();
        }
    }


    function changeClient() {

        $('#clients').change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    method: "POST",
                    url: "{{ route('getCars') }}",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(result, date) {
                        $('#cars').html(result);
                    }

                })
            }
        });
    }

    function changeService(count) {
        $('#price_' + count).val("");

        var value = $('#service_type_' + count).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            method: "POST",
            url: "{{ route('getServices') }}",
            data: {
                value: value,
                _token: _token
            },
            success: function(result, date) {
                $('#services_' + count).html(result);
            }

        })
    }

    function cardDiscount() {
        // var discount = Number($('#discount').val());
        var totalWithoutDiscount = Number($('#total_price').val());
        var totalWithDiscount = totalWithoutDiscount - discount;
        // var taxes = Number($('#taxes').val());
        // var totalTaxes = (taxes * totalWithDiscount) / 100;
        // var totalWithTaxes = Number(totalTaxes) + totalWithDiscount;

        $('#total_price').val(totalWithDiscount);

    }

    function showPrice(count) {
        var total = 0;
        var value = $('#services_' + count).val();

        var _token = $('input[name="_token"]').val();
        $.ajax({
            method: "POST",
            url: "{{ route('getPrice') }}",
            data: {
                value: value,
                _token: _token
            },
            success: function(result, date) {
                var total = 0;
                $('#price_' + count).val(result);
                for (var p = 0; p <= count; p++) {
                    if ($('#price_' + p).val()) {

                        var price = $('#price_' + p).val();
                        // alert(price);
                        total += Number(price);
                    }
                }
                $('#total_price').val(total);


                // var discount = Number($('#discount').val());
                // var totalWithDiscount = total - discount;
                // var taxes = Number($('#taxes').val());
                // var totalTaxes = (taxes * totalWithDiscount) / 100;
                // var totalWithTaxes = Number(totalTaxes) + totalWithDiscount;


                // $('#totalPriceWithTaxes').val(totalWithTaxes);



            }

        })

    }
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
        @include('layouts.error')

        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">
            
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
                                        @foreach($invoice->repairCard->items as $item )

                                        <tr>
                                            <td>
                                                @if($item->service->service_type =="1")
                                                أجور خدمات اليد )الإصلاحات)

                                                @elseif($item->service->service_type =="2")
                                                أجور الأعمال الخارجية
                                                @elseif($item->service->service_type =="3")
                                                قطع الغيار )مخزن داخلي)
                                                @elseif($item->service->service_type =="4")
                                                قطع غيار )مشتريات خارجية)
                                                @endif
                                            </td>
                                            <td>{{$item->service->service_name}}</td>
                                            <td>{{$item->service_client_cost}}</td>
                                        </tr>
                                        <?php $total += $item->service_client_cost ?>
                                        @endforeach
                                        <tr>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <td><?php echo $total ?></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Discount</th>
                                            <td><?php echo $invoice->repairCard->card_discount ?></td>
                                        </tr>
                                        <tr>
                                        <tr>

                                            <?php $taxes = $invoice->repairCard->card_taxes / 100 ?>
                                            <?php $totalWithTaxes = $invoice->repairCard->total_with_taxes; ?>
                                            <th></th>

                                            <th>Total With Taxes</th>
                                            <td><?php echo $totalWithTaxes ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div>


                                    <form class="form-inline" action="">
                                        <div class="form-group">
                                            <label for="paid">Paid:</label>
                                            <input type="text" class="form-control" value="{{$invoice->paid}}" id="paid" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="remain">Remain:</label>
                                            <input type="text" class="form-control" value="{{$invoice->remain}}" id="remain" disabled>
                                        </div>

                                    </form>

                                </div>

                            </div>
                            <!-- /.box-header -->
                        </div>
                        <!-- /.box-body -->
                    </div>






                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add New Service</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('repairCard.storeServiceItem',$repairCard->id)}}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <div class="row">

                                        <?php //$taxes = 5 
                                        ?>
                                        <input type="text" value="{{$taxes}}" name="card_taxes" id="taxes" hidden>

                                        <input type="text" value={{$number+1}} name="card_number" hidden>
                                        <!-- <input type='text' value="{{$repairCard->id}}" name="card_id" hidden> -->
                                        <div class="container">
                                            <!-- <h2>Items</h2> -->
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Service Type</th>
                                                        <th>Services</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='services'>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" name="service_type[0]" id="service_type_0" onchange="changeService(0)">
                                                                <option value="">Select</option>

                                                                <option value="1">أجور خدمات اليد -الإصلاحات</option>
                                                                <option value="2">أجور الأعمال الخارجية </option>
                                                                <option value="3">قطع الغيار- مخزن داخلي </option>
                                                                <option value="4">قطع غيار- مشتريات خارجية </option>

                                                            </select>


                                                        </td>
                                                        <td>
                                                            <select name="services[0]" id="services_0" class="form-control select2" onchange="showPrice(0)">
                                                                <option value="">Select One</option>
                                                            </select>


                                                        </td>
                                                        <td>
                                                            <input type='text' name="price[0]" id="price_0">

                                                        </td>
                                                        <td>
                                                            <input type="button" class="btn btn-green add" value="+">

                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!-- <tr>
                                                    <td colspan="2"></td>
                                                    <td><strong>Discount</strong></td>
                                                    <td>
                                                        <input type="number" name="card_discount" id="discount" onkeyup="cardDiscount()" value="0">

                                                    </td>

                                                </tr> -->

                                                <!-- <tr hidden>
                                                    <td colspan="2"></td>
                                                    <td><strong>Total Price </strong></td>
                                                    <td>
                                                        <input type='text' name="totalPrice" id="total_price" onkeyup="cardDiscount()">

                                                    </td>

                                                </tr> -->
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td><strong>Total Price</strong></td>

                                                    <td>
                                                        <input type='text' name="totalPrice" id="total_price" disabled>

                                                    </td>

                                                </tr>


                                            </table>
                                        </div>



                                        <input type="submit" class="btn btn-info" value="{{__('site.add')}}">
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