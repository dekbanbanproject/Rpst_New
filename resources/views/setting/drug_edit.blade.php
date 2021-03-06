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

<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">รายการยา</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                             
                                <li class="breadcrumb-item active">แก้ไขรายการยา
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">                   
                        <a href="{{ url('setting/drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-info btn-glow round px-2"><i class="fas fa-hand-point-left text-white-90 mr-1" style="font-size:15px "></i>ย้อนกลับ</a>                                                                 
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="floating-point">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="card">   
                                <div class="card-body shadow lg ">
            <form action="{{ route('setting.drug_update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="DRUG_ID" value="{{$drugs->DRUG_ID }}">
                                <input type="hidden" name ="idstore" id="idstore" value="{{ Auth::user()->store_id }}" class="form-control" >
                                <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >
                                <div class="form-row">
                                    <div class="col-md-6"><br>
                                        <div class="form-group">
                                            <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>

                                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($drugs->DRUG_IMG)) }}" id="add_preview" alt="Image" class="img-thumbnail" style="height:260px; width:270px;">
                                        </div>
                                        <div class="form-group">
                                            <input style="font-family: 'Kanit', sans-serif;" type="file" name="DRUG_IMG" id="DRUG_IMG" class="form-control input-sm" onchange="editURL(this)" >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="drug_code">Icode :</label>
                                        <input name ="DRUG_CODE" id="drug_code" class="form-control" value="{{ $drugs ->DRUG_CODE }}" required> <br>

                                        <label for="drug_name">รายการยา :</label>
                                        <input name ="DRUG_NAME" id="drug_name" class="form-control" value="{{ $drugs ->DRUG_NAME }}" required> <br>

                                            <label for="DRUG_UNIT">หน่วยนับ :</label>
                                        <select name ="DRUG_UNIT" id="DRUG_UNIT" class="form-control">
                                            <option value="">เลือก</option>
                                                @foreach ($units as $unit)
                                                @if($drugs->DRUG_UNIT == $unit->UNIT_ID)
                                                    <option value="{{ $unit ->UNIT_ID }}" selected>{{ $unit->UNIT_NAME}}</option>
                                                    @else
                                                    <option value="{{ $unit ->UNIT_ID }}">{{ $unit->UNIT_NAME}}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                            <br>

                                        <label for="DRUG_CAT">หมวดหมู่ :</label>
                                        <select name ="DRUG_CAT" id="DRUG_CAT" class="form-control">
                                            <option value="">เลือก</option>
                                                @foreach ($cats as $cat)
                                                @if($drugs->CAT_ID == $cat->CAT_ID)
                                                    <option value="{{ $cat ->CAT_ID }}" selected>{{ $cat->CAT_NAME}}</option>
                                                    @else
                                                    <option value="{{ $cat ->CAT_ID }}">{{ $cat->CAT_NAME}}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                    <div class="card-footer shadow lg">
                        <div class="form-row">
                            <div class="col-md-10 text-right">
                                <!-- <h5>ค้นหารายชื่อผู้ป่วย</h5> -->
                            </div>

                            <div class="col-md-2 ">
                            <button class="float-sm-right btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
<script>
        function editURL(input) {
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


