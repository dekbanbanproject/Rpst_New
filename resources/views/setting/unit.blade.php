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
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
        .container-fluid-boxs{

        }
       
      </style>
<?php
       
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');
?>
<section class="col-md-12">

<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">หน่วยนับ</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <!-- <li class="breadcrumb-item"><a href="#">สถานพยาบาล</a> -->
                                </li>
                                <li class="breadcrumb-item active">หน่วยนับ
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">  
                        <a href="" class="float-sm-right btn btn-success btn-glow round px-2" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus-circle text-white-90 mr-1" style="font-size:15px "></i> เพิ่มหน่วยนับ</a>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="floating-point">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <div class="card">   
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap shadow-lg">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered sourced-data" >                                   
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;color:#7B0099"width="10%">ลำดับ</th>
                                                        <th style="text-align: center;color:#7B0099" >หน่วยนับ</th>                       
                                                        <th style="text-align: center;color:#7B0099"width="15%">จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach ($units as $key => $item)
                                                        <tr class="pull-up">
                                                            <td align="center"> {{$key+1}}</td>
                                                            <td style="text-align: center;">{{$item->UNIT_NAME }}</td>
                                                            <td style="text-align: center;">
                                                                @if((Auth::user()->user_edit) == 'on' )
                                                                <a class="btn btn-warning btn-glow round px-2" href="" data-toggle="modal" data-target="#EditModal{{$item->UNIT_ID}}"><i class="fas fa-fw fa-edit" style='font-size:15px;color:white'></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                           
                                                                @endif
                                                                @if((Auth::user()->user_delete) == 'on' )
                                                                <a class="btn btn-danger btn-glow round px-2" title="Delete" id="unitdelete"  href="{{ url('setting/unitdestroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$item->UNIT_ID)}}" data-token="{{csrf_token()}}" data-id="{{$item->UNIT_ID}}"><i class="fas fa-fw fa-trash font-small-5" style='font-size:15px;color:white'></i></a>
                                                               
                                                                @endif
                                                            </td>                                                                                               
                                                        </tr>
                                                            <!-- Edit/.largeModal-->
                                                            <div class="modal fade" id="EditModal{{$item->UNIT_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                            <div class="modal-header shadow lg">
                                                                                <h5 style="color:#ffff">แก้ไขหน่วยนับ&nbsp;&nbsp;</h5>
                                                                            </div>
                                                                            <div class="modal-body shadow lg">
                                                                                <form action="{{ route('setting.unit_update')}}" method="POST" enctype="multipart/form-data" >
                                                                                    @csrf
                                                                                    <input type="hidden" name="idstore" value="{{(Auth::user()->store_id)}}" >
                                                                                    <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >

                                                                                    <div class="form-row">
                                                                                        <div class="col-md-12 text-left">
                                                                                            <label for="unit_name">หน่วยนับ :</label>
                                                                                            <input value="{{$item->UNIT_NAME}}"  name ="UNIT_NAME" id="unit_name" class="form-control" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="hidden" value="{{$item->UNIT_ID}}"  name ="UNIT_ID" id="UNIT_ID" class="form-control" required>
                                                                            </div>
                                                                            <div class="modal-footer shadow lg">
                                                                            <button class="btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                      

                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- Add/.largeModal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header shadow lg">
                            <h5 style="color:#ffff">เพิ่มหน่วยนับ&nbsp;&nbsp;</h5>
                        </div>
                        <div class="modal-body shadow lg">
                            <form action="{{ route('setting.unit_save')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idstore" value="{{(Auth::user()->store_id)}}" >
                                <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="unit_name">หน่วยนับ :</label>
                                        <input  name ="UNIT_NAME" id="unit_name" class="form-control" required>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer shadow lg">
                        <button class="btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</section>


@endsection
<script>
    $('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

function chkNumber(ele){
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
    ele.onKeyPress=vchar;
    }

</script>
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