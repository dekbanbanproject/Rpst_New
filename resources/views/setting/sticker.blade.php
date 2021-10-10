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
                                                            <th style="text-align: center;color:#7B0099" width="8%">Barcode</th>
                                                            <th style="text-align: center;color:#7B0099" width="10%">รูปภาพ</th>
                                                            <th style="text-align: center;color:#7B0099" width="8%">Qrcode</th>
                                                            <th style="text-align: center;color:#7B0099" >รายการยา</th>
                                                            <th style="text-align: center;color:#7B0099" width="15%">Barcode &nbsp;&nbsp;<span style="font-size: 1em; color: red;"><i class="fas fa-barcode"></i> </span></th>
                                                            <th style="text-align: center;color:#7B0099" width="15%">Qrcode&nbsp;&nbsp;<span style="font-size: 1em; color: orange;"><i class="fas fa-fw fa-qrcode"></i> </span></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $number = 0; ?>
                                                        @foreach ($drugs as $drug)
                                                            <?php $number++;  ?>
                                                                <tr>
                                                                    <td style="text-align: center;">{{ $number}}</td>
                                                                    <td style="text-align: center;">{{$drug->DRUG_CODE }}<?php echo DNS1D::getBarcodeHTML($drug->DRUG_CODE, 'C128');  ?></td>
                                                                    <td style="text-align: center;"><img src="data:image/png;base64,{{ chunk_split(base64_encode($drug->DRUG_IMG)) }}" alt="Image" class="img-thumbnail" style="height:60px; width:70px;"> </td>
                                                                    <td style="text-align: center;"> <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drug->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?></td>
                                                                    <td style="text-align: center;">{{$drug->DRUG_NAME }}</td>

                                                                    <td style="text-align: center;">
                                                                        <a href="{{ url('setting/stickerbarcodeprint/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$drug->DRUG_ID)  }}" ><span style='font-size:24px;color:red'><i class="fas fa-print"></i> </span></a>
                                                                    
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                    <a class="dropdown-item"  href="{{ url('setting/stickerqrcodeprint/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$drug->DRUG_ID )  }}" ><span style='font-size:24px;color:orange'><i class="fas fa-print"></i> </span></a>
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
