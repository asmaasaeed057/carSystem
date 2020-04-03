@extends('backend::layouts.main')
@section('content')

<div class="page-header">
    <div class="pull-left"><h1> انشاء</h1></div>
    <div class="pull-right">
        <img src="{{asset('themes/theme_back/img/logo.png')}}" alt="" class='retina-ready' width="59" height="49">
    </div>
</div>
<div class="breadcrumbs">

    <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a> <i class="icon-angle-left"></i></li>
        <li><a href="{{ route('account.index') }}"> الحسابات</a> <i class="icon-angle-left"></i></li>
        <li><a href="">اضافة</a></li>
    </ul>
    <div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>

</div>


<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-th-list"> </i>اضافة</h3>
            </div>

            <div class="box-content nopadding">

                <form enctype="multipart/form-data"  class="form-horizontal form-bordered form-validate" id="pages-form" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="control-group">
                        <label class="control-label required" for="Name">المجموعه  <span class="required">*</span></label>           
                        <div class="controls">

                            <select class="" name="group_id" required="required">
                                <option value="">اختار</option>
                                @foreach($groups as $group)
                                <option value="{{$group->group_id }}">{{$group->group_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label required" for="Name">الاسم  <span class="required">*</span></label>           
                        <div class="controls">

                            <input size="60" maxlength="120" name="name" id="" type="text" style="height:20px; width: 220px; float: right;" required="required"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="Name">البريد الالكترونى  <span class="required">*</span></label>           
                        <div class="controls">

                            <input size="60" maxlength="120" name="email" id="" type="email" style="height:20px; width: 220px; float: right;" required="required"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="Name">كلمة المرور  <span class="required">*</span></label>           
                        <div class="controls">

                            <input size="60" maxlength="120" name="password" id="" type="Password" style="height:20px; width: 220px; float: right;" required="required"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label required" for="Name">اعادة كلمة المرور  <span class="required">*</span></label>           
                        <div class="controls">

                            <input size="60" maxlength="120" name="password_confirmation" id="" type="password" style="height:20px; width: 220px; float: right;" required="required"/>
                        </div>
                    </div>




                    <div class="form-actions">
                        <input class="btn btn-primary" type="submit" value="انشاء" style="float: right;" /> 
                    </div>

                </form>

            </div>
        </div>
    </div>
    @endsection
