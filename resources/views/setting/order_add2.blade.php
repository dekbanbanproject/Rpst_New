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
        $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รายการสั่งซื้อ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ทำรายการสั่งซื้อ</li>
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

<?php
    
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');
?>
<section class="col-md-12">
    <div class="card-p shadow mb-4 ">
        <div class="card-header shadow lg">
            <h6 class="float-sm-left  font-weight-bold text-primary">ทำรายการสั่งซื้อ</h6>
            <a href="{{ url('setting/order/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="float-sm-right btn btn-sm btn-warning shadow-lg"><i class="fas fa-chevron-circle-left text-white-50" style="font-size:18px "></i>&nbsp; ย้อนกลับ</a>
        </div>



        <div class="card-body shadow lg">
            <form action="{{ route('setting.order_save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idstore" value="{{(Auth::user()->store_id)}}" >
                    <input type="hidden" name="iduser" value="{{(Auth::user()->id)}}" >

                    <div class="form-row">
                        <div class="col-md-2 mb-2 text-left">
                            <label for="ORDER_DATE">วันที่สั่งซื้อ :</label>
                            <input type="date" name ="ORDER_DATE" id="ORDER_DATE" class="form-control datepicker" data-date-format="dd/mm/yyyy " required>
                        </div>

                        <div class="col-md-2 mb-2 text-left">
                            <label for="order_bilno">เลขที่บิล :</label>
                            <input value="{{ $refnumbers }}" name ="ORDER_BILLNO" id="order_bilno" class="form-control" required >
                        </div>
                        <div class="col-md-2 mb-2 text-left">
                            <label for="ORDER_YEAR">ปีงบประมาณ :</label>
                            <select name="ORDER_YEAR" id="ORDER_YEAR" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" required>
                                        <option value="">--เลือก--</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year ->YEAR_ID }}" >{{ $year-> YEAR_NAME}}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="col-md-3 mb-3 text-left">
                            <label for="ORDER_BILLPO">เลขที่ PO :</label>
                            <input value="{{ $billPOs }}"  name ="ORDER_BILLPO" id="ORDER_BILLPO" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-2 text-left">
                            <label for="ORDER_STAFF">ผู้สั่ง :</label>
                            <input type="hidden" value="{{Auth::user()->id}} " name ="ORDER_STAFF" id="ORDER_STAFF" class="form-control"  >
                            <input value="{{$id_user}} &nbsp;&nbsp;{{Auth::user()->lname}}" name ="ORDER_STAF_NAMEF" id="ORDER_STAF_NAMEF" class="form-control"  readonly>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3 text-left">
                                <label for="ORDER_SUP">supplies :</label>
                                    <select name="ORDER_SUP" id="ORDER_SUP" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" required>
                                        <option value="">--เลือก--</option>
                                        @foreach ($sups as $sup)
                                            <option value="{{ $sup ->SUP_ID }}" >{{ $sup-> SUP_NAME}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3 text-left">
                                <label for="ORDER_APPROVER">ผู้เห็นชอบ :</label>
                                    <select name="ORDER_APPROVER" id="ORDER_APPROVER" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" required>
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
                                            <td style="text-align: center;color:#7B0099" width="3%">ลำดับ</td>
                                            <td style="text-align: center;color:#7B0099" >รายการ</td>
                                            <td style="text-align: center;color:#7B0099" width="15%">หน่วยนับ</td>
                                            <td style="text-align: center;color:#7B0099" width="15%">จำนวน</td>
                                            <td style="text-align: center;color:#7B0099" width="15%">ราคา</td>

                                            <td style="text-align: center;color:#7B0099" width="5%">
                                                <a class="btn btn-sm btn-success addRow" style="color:#FFFFFF;"><i class="fas fa-plus" ></i></a>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody1">
                                        <tr>
                                            <td style="text-align: center;"> 1 </td>
                                            <td>                                               
                                                <input list="article_num" name="ORDER_DETAIL_DRUG_ID[]" id="ORDER_DETAIL_DRUG_ID[]" class="form-control" >
                                                <datalist id="article_num">
                                                    <option value="">--เลือก--</option>
                                                    @foreach ($drugs as $drug)
                                                        <option value="{{ $drug ->DRUG_ID }} => {{ $drug-> DRUG_CODE}} =>{{ $drug-> DRUG_NAME}}" >{{ $drug-> DRUG_CODE}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_NAME}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_STRENGTH}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_UNIT_PRICE}}</option>
                                                    @endforeach
                                                </datalist> 
                                                                                </td>
                                            <td>
                                            <input list="orderdetail" name="ORDER_DETAIL_DRUG_UNIT[]" id="ORDER_DETAIL_DRUG_UNIT[]" class="form-control" >
                                            <datalist id="orderdetail">
                                                <option value="">--เลือก--</option>
                                                     @foreach ($units as $unit)
                                                        <option value="{{ $unit ->UNIT_ID }}">{{ $unit-> UNIT_NAME}}</option>
                                                    @endforeach
                                            </datalist>
                                        </td>
                                            <td>
                                                <input name="ORDER_DETAIL_DRUG_QTY[]" id="ORDER_DETAIL_DRUG_QTY[]" class="form-control">
                                            </td>
                                            <td>
                                                <input name="ORDER_DETAIL_DRUG_PRICE[]" id="ORDER_DETAIL_DRUG_PRICE[]" class="form-control " >
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

                            <a href="{{ url('setting/order/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="btn btn-danger" data-dismiss="modal"><i class='fas fa-door-closed' style='font-size:15px;color:white'></i>&nbsp;&nbsp;Close</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</section>
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
                '<input list="article_num" name="ORDER_DETAIL_DRUG_ID[]" id="ORDER_DETAIL_DRUG_ID[]" class="form-control" >'+
                '<datalist id="article_num">'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($drugs as $drug)'+
                '<option value="{{ $drug ->DRUG_ID }}">{{ $drug-> DRUG_CODE}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_NAME}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_STRENGTH}}&nbsp;&nbsp;&nbsp;{{ $drug-> DRUG_UNIT_PRICE}}</option>'+
                '@endforeach' +
                '</datalist>'+
                '</td>'+
                '<td>'+
                '<input list="orderdetail" name="ORDER_DETAIL_DRUG_UNIT[]" id="ORDER_DETAIL_DRUG_UNIT[]" class="form-control">'+
                '<datalist id="orderdetail">'+
                '<option value="">--เลือก--</option>'+
                '@foreach ($units as $unit)'+
                '<option value="{{$unit->UNIT_ID}}">{{ $unit->UNIT_NAME}}</option>'+
                '@endforeach'+
                '</datalist>'+
                '</td>'+
                '<td>'+
                '<input name="ORDER_DETAIL_DRUG_QTY[]" id="ORDER_DETAIL_DRUG_QTY[]" class="form-control">'+
                '</td>'+
                '<td>'+
                '<input name="ORDER_DETAIL_DRUG_PRICE[]" id="ORDER_DETAIL_DRUG_PRICE[]" class="form-control">'+
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
