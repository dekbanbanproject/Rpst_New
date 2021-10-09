@extends('layouts.adminlte_medical')
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
        $ln = Auth::user()->lname;
        $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>
<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
function formate($strDate)
{
$strYear = date("Y",strtotime($strDate));
$strMonth= date("m",strtotime($strDate));
$strDay= date("d",strtotime($strDate));

return $strDay."/".$strMonth."/".$strYear;
}
function formatetime($strtime)
{
$H = substr($strtime,0,5);
return $H;
}
date_default_timezone_set("Asia/Bangkok");
$date = date('Y-m-d');

use App\Http\Controllers\ClinicsettingController;

?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">เบิก-จ่ายยา</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">เบิก-จ่ายยา</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
        .card-p{
            margin-left: 80px;
            margin-right: 80px;
        }
        .content-header{
            margin-left: 80px;
            margin-right: 80px;
        }
      </style>


<section class="col-md-12">
    <div class="card-p shadow mb-4 ">
        <div class="card-header shadow lg">
            <h6 class="float-sm-left  font-weight-bold text-primary">เบิก-จ่ายยา</h6>
            <a href="{{ url('setting/pay_drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>
        </div>

        <div class="card-body shadow lg">
            <form action="{{ route('setting.pay_drug_save')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name ="idstore" id="idstore" value="{{(Auth::user()->store_id)}}" class="form-control" >
                    <input type="hidden" value="{{(Auth::user()->id)}}"  name ="iduser" id="iduser" class="form-control"  >

                    <div class="form-row">
                        <div class="col-md-2 mb-3 text-left">
                            <label for="PAY_DATE">วันเบิก-จ่าย :</label>
                            <input type="date" name ="PAY_DATE" id="PAY_DATE" class="form-control datepicker" data-date-format="mm/dd/yyyy" required>
                        </div>
                        <div class="col-md-2 mb-3 text-left">
                            <label for="PAY_BILLNO">เลขที่บิล :</label>
                            <input value="{{ $refnumbers }}" name ="PAY_BILLNO" id="PAY_BILLNO" class="form-control"  >
                        </div>


                        <div class="col-md-2 mb-2 text-left">
                            <label for="PAY_YEAR">ปีงบประมาณ :</label>
                            <select name="PAY_YEAR" id="PAY_YEAR" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" required>
                                        <option value="">--เลือก--</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year ->YEAR_ID }}" >{{ $year-> YEAR_NAME}}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="col-md-2 mb-3 text-left">
                            <label for="PAY_BILL_ORDERS">เลขที่ PO :</label>
                            <input  name ="PAY_BILL_ORDERS" id="PAY_BILL_ORDERS" class="form-control"  required>
                        </div>
                        <div class="col-md-1 mb-1 text-left">
                            <label for="PAY_BILL_ORDERS">ดูเลขที่ PO </label>&nbsp;&nbsp;
                           <a href="" class="btn btn-info" data-toggle="modal" data-target=".addlevel">&nbsp;&nbsp;&nbsp;เลือก&nbsp;&nbsp;&nbsp;</a>
                        </div>
                        <div class="col-md-3 mb-2 text-left">
                            <label for="PAY_STAFF">ผู้จ่าย :</label>

                            <input value="{{$id_user}}&nbsp;&nbsp;{{Auth::user()->lname}} "  name ="PAY_STAFFH" id="PAY_STAFFH" class="form-control"  readonly>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3 text-left">
                                <label for="PAY_STORE">คลังที่เบิก :</label>
                                <select name="PAY_STORE" id="PAY_STORE" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" required>
                                        <option value="">--เลือก--</option>
                                        @foreach ($locates as $locate)
                                            <option value="{{ $locate ->LOCATE_ID }}" >{{ $locate-> LOCATE_NAME}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-3 mb-3 text-left">
                                <label for="PAY_USER">ผู้เบิก :</label>
                                <select name="PAY_USER" id="PAY_USER" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" required>
                                    <option value="">--เลือก--</option>
                                    @foreach ($userABs as $userAB)
                                        <option value="{{ $userAB ->id }}" >{{ $userAB-> name}} {{ $userAB-> lname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3 text-left">
                                <label for="PAY_APPROVER">ผู้เห็นชอบ :</label>
                                <select name="PAY_APPROVER" id="PAY_APPROVER" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" required>
                                        <option value="">--เลือก--</option>
                                        @foreach ($userAs as $userA)
                                            <option value="{{ $userA ->id }}" >{{ $userA-> name}} {{ $userA-> lname}}&nbsp;&nbsp; ตำแหน่ง &nbsp;{{ $userA->POSITION_NAME}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            </div>
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="object1" role="tabpanel">
                                <table class="table-bordered table-striped table-vcenter" style="width: 100%;">

                                    <thead>
                                        <tr>
                                            <td style="text-align: center;color:#7B0099" width="5%">ลำดับ</td>
                                            <td style="text-align: center;color:#7B0099" >รายการ</td>
                                            <!-- <td style="text-align: center; font-size: 13px;" >LOT</td> -->

                                            <td style="text-align: center;color:#7B0099" width="12%">หน่วยนับ</td>
                                            <td style="text-align: center;color:#7B0099" width="15%">จำนวน</td>
                                            <td style="text-align: center;color:#7B0099" width="20%">ราคา</td>
                                            <td style="text-align: center;color:#7B0099" width="5%">
                                                <a class="btn btn-sm btn-success addRow" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody1">
                                        <tr>
                                            <td style="text-align: center;"> 1 </td>
                                            <td>
                                            <input list="store_pay" name="PAYDETAIL_DRUG_ID[]" id="PAYDETAIL_DRUG_ID[]" class="form-control" >
                                            <datalist id="store_pay">
                                                    <option value="">--เลือก--</option>
                                                    @foreach ($drugs as $drug)
                                                        @if( number_format(ClinicsettingController::sumtotalqty($drug->DRUG_CODE))  == '0')
                                                            @else
                                                                <option value="{{ $drug ->DRUG_ID }}}&nbsp;&nbsp; {{ $drug-> DRUG_CODE}}&nbsp;&nbsp;{{ $drug-> DRUG_NAME}}">{{ $drug-> DRUG_CODE}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_NAME}}&nbsp;&nbsp;&nbsp;{{ $drug-> UNIT_NAME}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_UNIT_PRICE}}</option>
                                                        @endif
                                                    @endforeach

                                                </datalist>
                                            </td>
                                            <td>
                                            <select name="PAYDETAIL_DRUG_UNIT[]" id="PAYDETAIL_DRUG_UNIT[]" class="form-control" >
                                                <option value="">--เลือก--</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit ->UNIT_ID }}">{{ $unit-> UNIT_NAME}}</option>
                                                    @endforeach
                                            </select>

                                            </td>
                                            <td>
                                                <input name="PAYDETAIL_DRUG_QTY[]" id="PAYDETAIL_DRUG_QTY[]" class="form-control qty1">
                                            </td>
                                            <td>
                                                <input name="PAYDETAIL_DRUG_PRICE[]" id="PAYDETAIL_DRUG_PRICE[]" class="form-control input-sm" >
                                            </td>
                                            <td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer shadow lg">
                            <button class="btn btn-info" type="submit" ><i class="fa fa-save fa-sm text-white-50" style="font-size:15px "></i>&nbsp;&nbsp;บันทึก </button>
                            <a href="{{ url('setting/pay_drug/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="btn btn-danger" data-dismiss="modal"><i class='fas fa-door-closed' style='font-size:15px;color:white'></i>&nbsp;&nbsp;Close</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</section>

<div class="modal fade addlevel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modallevel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" style="font-family: 'Kanit', sans-serif; font-size:15px;font-size: 1.5rem;font-weight:normal;">รายการสั่งซื้อทั้งหมด</h2>
            </div>
        <div class="modal-body">
    <body>

            <div style='overflow:scroll; height:300px;'>
            <table class="table">
                <thead>
                    <tr>
                        <td style="text-align: center;" width="5%">ลำดับ</td>
                        <td style="text-align: center;" >เลขที่บิล</td>
                        <td style="text-align: center;" >เลขที่ PO</th>
                        <td style="text-align: center;">วันที่</td>
                        <td style="text-align: center;" width="5%">เลือก</td>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php $number = 0; ?>
                    @foreach ($no_orders as $no_order)
                    <?php $number++;  ?>
                        <tr>
                            <td style="text-align: center;">{{$number}}</td>
                            <td style="text-align: center;">{{$no_order->ORDER_BILLNO}}</td>
                            <td style="text-align: center;">{{$no_order->ORDER_BILLPO}}</td>
                            <td style="text-align: center;">{{DateThai($no_order->ORDER_DATE)}}</td>
                            <td style="text-align: center;"><a href="" class="btn btn-sm btn-info">เลือก</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    </body>
</div>
</div>
</div>


<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
$('.addRow').on('click',function(){
         addRow();
     });
     function addRow(){
        var count = $('.tbody1').children('tr').length;
        var tr ='<tr>'+
                '<td style="text-align: center;">'+
                (count+1)+
                '</td>'+
                '<td>'+
                '<input list="store_pay" name="PAYDETAIL_DRUG_ID[]" id="PAYDETAIL_DRUG_ID[]" class="form-control">'+
                '<datalist id="store_pay">'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($drugs as $drug)'+
                '<option value="{{ $drug ->DRUG_ID }}">{{ $drug-> DRUG_CODE}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_NAME}}&nbsp;&nbsp;&nbsp;{{ $drug-> UNIT_NAME}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_UNIT_PRICE}}</option>'+
                '@endforeach' +
                '</select>'+
                '</td>'+
                '<td>'+
                '<select name="PAYDETAIL_DRUG_UNIT[]" id="PAYDETAIL_DRUG_UNIT[]" class="form-control" >'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($units as $unit)'+
                '<option value="{{ $unit ->UNIT_ID }}">{{ $unit-> UNIT_NAME}}</option> '+
                '@endforeach' +
                '</select>'+
                '</td>'+
                '<td>'+
                '<input name="PAYDETAIL_DRUG_QTY[]" id="PAYDETAIL_DRUG_QTY[]" class="form-control">'+
                '</td>'+
                '<td>'+
                '<input name="PAYDETAIL_DRUG_PRICE[]" id="PAYDETAIL_DRUG_PRICE[]" class="form-control input-sm">'+
                '</td>'+
                '<td style="text-align: center;"><a class="btn btn-sm btn-danger fa fa-trash-alt remove" style="color:#FFFFFF;"></a></td>'+
                '</tr>';
        $('.tbody1').append(tr);
     };

     $('.tbody1').on('click','.remove', function(){
            $(this).parent().parent().remove();

     });
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

function chkNumber(ele){
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
    ele.onKeyPress=vchar;
    }

</script>
@endsection
