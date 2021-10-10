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
                    <h3 class="content-header-title mb-0 d-inline-block">หนังสือส่ง</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <!-- <li class="breadcrumb-item"><a href="#">สถานพยาบาล</a> -->
                                </li>
                                <li class="breadcrumb-item active">หนังสือส่ง
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right"> 
                        <a href="{{url('setting/drug_create/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="float-sm-right btn btn-success btn-glow round px-2"><i class="fas fa-plus-circle text-white-90 mr-1" style="font-size:15px "></i>หนังสือส่ง</a>&nbsp;&nbsp;                 
                       
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="floating-point">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <div class="card">  
                        <div class="card-content collpase show">
                            <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered sourced-data" width="100%"> 
                                  
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">No</th>
                                                <th class="border-top-0">Vn</th>
                                                <th class="border-top-0">Hn</th>
                                                <th class="border-top-0">วันที่สแกน</th>
                                                <th class="border-top-0">ประเภท</th>
                                                <th class="border-top-0">ชื่อ-นามสกุล</th>                                               
                                                <th class="border-top-0">Views</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($allData as $key => $item)
                                                <tr class="pull-up">
                                                    <td align="center"> {{$key+1}}</td>
                                                    <td class="text-truncate">{{$item->vn}}</td>                                                 
                                                    <td class="text-truncate">{{$item->hn}}</td>
                                                    <td class="text-truncate">{{DateThai($item->datescan)}}</td>
                                                    <td class="text-truncate">{{$item->DocTypeName}}</td>
                                                    <td class="text-truncate">{{$item->firstname}}  {{$item->lastname}}</td>
                                                    <td>
                                                        <a href="{{url('backend/opd/scan_opddetail/'.$item->hn.'/'.$item->vn)}}" class="btn btn-warning btn-glow round px-2"><i class="fas fa-fw fa-edit font-small-5" style='font-size:15px;color:white'></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;    
                                                        <a href="" class="btn btn-info btn-glow round px-2"><i class="fas fa-fw fa-trash font-small-5" style='font-size:15px;color:white'></i></a>                                                                       
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

<script>
        function addURL(input) {
            var fileInput = document.getElementById('DRUG_IMG');
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#add_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                    fileInput.value = '';
                    return false;
                }
            }
</script>
