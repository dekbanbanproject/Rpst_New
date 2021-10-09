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
                    <h3 class="content-header-title mb-0 d-inline-block">รายการยา</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <!-- <li class="breadcrumb-item"><a href="#">สถานพยาบาล</a> -->
                                </li>
                                <li class="breadcrumb-item active">รายการยา
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right"> 
                        <a href="{{url('setting/drug_create/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="float-sm-right btn btn-success btn-glow round px-2"><i class="fas fa-plus-circle text-white-90 mr-1" style="font-size:15px "></i>เพิ่มรายการยา</a>&nbsp;&nbsp;                 
                        <a href="" class="float-sm-right btn btn-info btn-glow round px-2" data-toggle="modal" data-target="#exampleModal{{(Auth::user()->store_id)}}"><i class="fas fa-file-excel text-white-90 mr-1" style="font-size:15px "></i> นำเข้าด้วย Excel</a>&nbsp;&nbsp;
                        <a href="{{url('hos/drug_hos/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="float-sm-right btn btn-success btn-glow round px-2"><i class="fas fa-plus-circle text-white-90 mr-1" style="font-size:15px "></i> เพิ่มรายการยาจาก Hos</a>&nbsp;&nbsp;
                        <a href="{{url('setting/drug_print/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="float-sm-right btn btn-warning btn-glow round px-2"><i class="fas fa-print text-white-90 mr-1" style="font-size:15px "></i>Print Drug all&nbsp;&nbsp;</a>
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
                                                        <th style="text-align: center;color:#7B0099" width="2%">ลำดับ</th>
                                                        <th style="text-align: center;color:#7B0099" width="10%">Icode</th>
                                                        <th style="text-align: center;color:#7B0099" width="8%">รูปภาพ</th>
                                                        <th style="text-align: center;color:#7B0099" >รายการยา</th>
                                                        <th style="text-align: center;color:#7B0099" width="8%">หน่วยนับ</th>
                                                        <th style="text-align: center;color:#7B0099" width="7%">รับ</th>
                                                        <th style="text-align: center;color:#7B0099" width="10%">เบิก-จ่าย</th>
                                                        <th style="text-align: center;color:#7B0099" width="10%">จ่าย(Hosxp)</th>
                                                        <th style="text-align: center;color:#7B0099" width="8%">คงเหลือ</th>
                                                        <th style="text-align: center;color:#7B0099 "width="12%">จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach ($drugs as $key => $drug)
                                                        <tr class="pull-up">   
                                                            <td style="text-align: center;">{{$key+1}}</td>
                                                            <td style="text-align: center;" width="10%">{{$drug->DRUG_CODE }}<?php echo DNS1D::getBarcodeHTML($drug->DRUG_CODE, 'C128');  ?></td>
                                                            <td style="text-align: center;"><img src="data:image/png;base64,{{ chunk_split(base64_encode($drug->DRUG_IMG)) }}" alt="Image" class="img-thumbnail" style="height:60px; width:70px;"> </td>
                                                            <td style="text-align: center;">{{$drug->DRUG_NAME }}</td>
                                                            <td style="text-align: center;">{{$drug->UNIT_NAME }}</td>
                                                            <td style="text-align: center;">{{number_format(ClinicsettingController::sumrecieve($drug->DRUG_ID))}}</td>
                                                            <td style="text-align: center;">{{number_format(ClinicsettingController::sumpay($drug->DRUG_ID))}}</td>
                                                            <td style="text-align: center;">{{number_format(ClinicsettingController::sumdrughos_qty($drug->DRUG_CODE))}}</td>


                                                            @if(number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE)) == '0'  )
                                                                <td style="text-align: center;color:#f1120a;background-color: #f8f597;font-size:20px;">{{number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE)) }}</td>
                                                            @elseif( number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE))  >= '100')
                                                                <td style="text-align: center;color:#8a18f5;background-color: #ffffff;font-size:20px;">{{number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE)) }}</td>
                                                            @elseif( number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE))  <= '90' )
                                                                <td style="text-align: center;color:#95E605;background-color: #ffffff;font-size:20px;">{{number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE)) }}</td>
                                                            @else
                                                                <td style="text-align: center;">{{number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE)) }}</td>
                                                            @endif

                                                            <td style="text-align: center;" width="12%">                                       
                                                                    <a class="btn btn-info btn-glow round px-2" href="{{ url('setting/sticker/'.(Auth::user()->store_id).'/'.(Auth::user()->id))  }}"><i class="fas fa-fw fa-qrcode" style='font-size:15px;color:white'></i></a>
                                                                    @if((Auth::user()->user_edit) == 'on' )
                                                                    <a class="btn btn-warning btn-glow round px-2" href="{{ url('setting/drug_edit/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$drug->DRUG_ID )}}"><i class="fas fa-fw fa-edit" style='font-size:15px;color:white'></i> </a>
                                                                    @endif
                                                             
                                                                    @if((Auth::user()->user_delete) == 'on' ) 
                                                                    <a class="btn btn-danger btn-glow round px-2" href="{{ url('setting/drugdestroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$drug->DRUG_ID)}}" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')" ><i class="fas fa-fw fa-trash font-small-5" style='font-size:15px;color:white'></i></a>
                                                                    @endif
                                                            </td>                                                          

                                                        </tr>
                                                            <!-- Edit/.largeModal-->
                                                                    <div class="modal fade" id="EditModal{{$drug->DRUG_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg" role="document">
                                                                                    <div class="modal-content">
                                                                                            <div class="modal-header shadow lg">
                                                                                                <h5 style="color:#ffff">แก้ไขรายการยา&nbsp;&nbsp;</h5>
                                                                                            </div>
                                                                                            <div class="modal-body shadow lg">
                                                                                                <form action="{{ route('setting.drug_update')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                                                                                    @csrf
                                                                                                    <input type="hidden" value="{{$drug->DRUG_ID }}"  name ="DRUG_ID" id="DRUG_ID" class="form-control" >
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-md-6 mb-6"><br>
                                                                                                            <div class="form-group">
                                                                                                                <label style=" font-family: 'Kanit', sans-serif;">รูปภาพ</label>
                                                                                                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($drug->DRUG_IMG)) }}" id="edit_preview" alt="Image" class="img-thumbnail" style="height:270px; width:290px;">

                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                <input style="font-family: 'Kanit', sans-serif;" type="file" name="DRUG_IMG" id="DRUG_IMG" class="form-control input-sm" onchange="readURL(this)" >
                                                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                                                <div class="invalid-feedback">กรุณาเลือกภาพ</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6 mb-6">
                                                                                                            <label for="DRUG_NAME">รายการยา :</label>
                                                                                                            <input value="{{$drug->DRUG_NAME }}"  name ="DRUG_NAME" id="DRUG_NAME" class="form-control" > <br>

                                                                                                            <label for="DRUG_UNIT">หน่วยนับ :</label>
                                                                                                            <select name ="DRUG_UNIT" id="DRUG_UNIT" class="form-control">
                                                                                                                <option value="">เลือก</option>
                                                                                                                    @foreach ($units as $unit)
                                                                                                                        @if($drug->DRUG_UNIT == $unit->UNIT_ID)
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
                                                                                                                        @if($drug->CAT_ID == $cat->CAT_ID)
                                                                                                                        <option value="{{ $cat ->CAT_ID }}" selected>{{ $cat->CAT_NAME}}</option>
                                                                                                                        @else
                                                                                                                        <option value="{{ $cat ->CAT_ID }}">{{ $cat->CAT_NAME}}</option>
                                                                                                                        @endif
                                                                                                                    @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <br>

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
<!-- Modal -->
<div class="modal fade" id="exampleModal{{(Auth::user()->store_id)}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    <form action="{{ route('setting.drug_excel')}}" method="POST" enctype="multipart/form-data">
        @csrf

<input type="hidden" name="store_id" value="{{(Auth::user()->store_id)}}">
<input type="hidden" name="user_id" value="{{(Auth::user()->id)}}">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel Drug</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <input type="file" name="DRUG_EXCEL" id="DRUG_EXCEL" class="form-control input-sm" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="invalid-feedback">กรุณาเลือกไฟล์ Excel</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off fa-sm text-white-80" style="font-size:15px "></i>&nbsp;&nbsp;Close&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-upload fa-sm text-white-80" style="font-size:15px "></i>&nbsp;&nbsp;Import&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
    </div>
</div>

  
@endsection
<script>
        function readURL(input) {
            var fileInput = document.getElementById('DRUG_IMG');
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#edit_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    alert('กรุณาอัพโหลดไฟล์ประเภทรูปภาพ .jpeg/.jpg/.png/.gif .');
                    fileInput.value = '';
                    return false;
                }
            }
</script>
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