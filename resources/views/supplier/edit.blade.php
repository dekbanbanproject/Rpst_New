@extends('layouts.adminhome')
@section('content')
<script>
    function checklogin(){
     window.location.href = '{{route("Per.welcome")}}';
    }
</script>
<?php

    if(Auth::check()){
        $status = Auth::user()->status;
        $id_user = Auth::user()->name;
        $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>

<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Supplier</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Supplier</a>
                                </li>
                                <li class="breadcrumb-item active">เพิ่มตัวแทนจำหน่าย
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">                   
                        <a href="{{ url('supplier/supindex/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-info btn-glow round px-2"><i class="fas fa-hand-point-left text-white-90 mr-1" style="font-size:15px "></i>ย้อนกลับ</a>                                                                 
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="floating-point">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="card">   
                                <div class="card-body shadow lg ">
                <form action="{{url('supplier/update/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$data->SUP_ID)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                            <div class="form-row">

                                    <div class="form-group col-md-8 text-left">
                                        <label for="sup_name">ชื่อ Supplier</label>
                                        <input value="{{$data->SUP_NAME }}" name ="sup_name" id="sup_name" class="form-control" required>
                                        <div class="invalid-feedback"> กรอกชื่อ Supplier</div>
                                    </div>
                                    <div class="form-group col-md-4 text-left">
                                        <label for="sup_tel">เบอร์โทร</label>
                                        <input value="{{$data->SUP_TEL }}" name ="sup_tel" id="sup_tel" class="form-control" required>
                                        <div class="invalid-feedback"> กรอกเบอร์โทร</div>
                                    </div>

                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-12 text-left">
                                        <label for="sup_address">ที่อยู่</label>
                                       <textarea name="sup_address" id="sup_address" class="form-control" rows="4" required>{{$data->SUP_ADDRESS }}</textarea>
                                       <div class="invalid-feedback">กรอกที่อยู่ </div>
                                    </div>
                            </div>
                        </div>

                    <div class="card-footer shadow lg">
                        <div class="form-row">
                            <div class="col-md-10 text-right">
                            </div>

                            <div class="col-md-2">
                            <input class="float-sm-right btn btn-info" type="submit"  value="Update"><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp; </input>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
                    </div>
            </div>
        </div>

</section>
@endsection
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules:{
                sup_name:{
                    required:true,
                },
                sup_tel:{
                    required:true,
                },
                sup_address:{
                    required:true,
                }
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement:function(error,element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element,errorClass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element,errorClass,validClass){
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
