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
        use App\Http\Controllers\ClinicsettingController;
?>
<section class="col-md-12">

<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">เบิก-จ่ายยา</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                </li>
                                <li class="breadcrumb-item active">เบิก-จ่ายยา
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right"> 
                        <a href="{{url('setting/pay_drug_add/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="float-sm-right btn btn-success btn-glow round px-2" ><i class="fas fa-plus-circle text-white-90 mr-1" style="font-size:15px "></i>&nbsp;&nbsp; เบิก-จ่ายยา</a>
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

                                                <table class="table table-hover" id="example1" width="100%" >
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;color:#7B0099" width="3%">ลำดับ</th>
                                                            <th style="text-align: center;color:#7B0099" width="10%">วันที่</th>
                                                            <th style="text-align: center;color:#7B0099" width="15%">เลขที่บิล</th>
                                                            <th style="text-align: center;color:#7B0099" >คลังที่เบิก</th>
                                                            <th style="text-align: center;color:#7B0099" width="15%">เจ้าหน้าที่</th>
                                                            <th style="text-align: center;color:#7B0099" width="15%">Total</th>
                                                            <th style="text-align: center;color:#7B0099" width="15%">จัดการ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $number = 0; ?>
                                                        @foreach ($pays as $pay)
                                                            <?php $number++;  ?>
                                                                <tr>
                                                                    <td style="text-align: center;">{{ $number}}</td>
                                                                    <td style="text-align: center;">{{DateThai($pay->PAY_DATE) }}</td>
                                                                    <td style="text-align: center;">{{ $pay->PAY_BILLNO}}</td>
                                                                    <td style="text-align: center;">{{ $pay->LOCATE_NAME}}</td>
                                                                    <td style="text-align: center;">{{ $pay->name}}  &nbsp;&nbsp; {{ $pay->lname}}</td>
                                                                    <td style="text-align: center;">{{ $pay->PAY_TOTAL}}</td>
                                                                    <td style="text-align: center;" width="15%">
                                                                        <a class="btn btn-info btn-glow round px-2" href="{{ url('setting/pay_print/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$pay->PAY_ID )  }}" ><i class="fas fa-print" style='font-size:15px;color:white'></i> </a>
                                                                        &nbsp;&nbsp;
                                                                        @if((Auth::user()->user_edit) == 'on' )
                                                                        <a class="btn btn-warning btn-glow round px-2" href="{{ url('setting/pay_drug_edit/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$pay->PAY_ID )  }}"><i class="fas fa-fw fa-edit" style='font-size:15px;color:white'></i></a>
                                                                        
                                                                        @endif
                                                                        &nbsp;&nbsp;
                                                                        @if((Auth::user()->user_delete) == 'on' ) 
                                                                        <a class="btn btn-danger btn-glow round px-2" href="{{ url('setting/pay_drug_destroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$pay->PAY_ID)}}" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')" ><i class="fas fa-fw fa-trash font-small-5" style='font-size:15px;color:white'></i></a>

                                                                        @endif
                                                                    </td>
                                                                </tr>
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



