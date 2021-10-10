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


<?php      
      date_default_timezone_set("Asia/Bangkok");
      $date = date('Y-m-d');
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
                                <li class="breadcrumb-item active">ตัวแทนจำหน่าย
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">                   
                        <a href="{{ url('supplier/create/'.(Auth::user()->store_id).'/'.(Auth::user()->id)) }}" class="float-sm-right btn btn-success btn-glow round px-2"><i class="fas fa-plus-circle text-white-90 mr-1" style="font-size:15px "></i>เพิ่ม Supplier</a>                                                                 
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
                                            <table id="example" class="table table-striped table-bordered sourced-data" width="100%">                                   
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0" style="text-align: center;color:#7B0099" width="3%">ลำดับ</th>
                                                        <th class="border-top-0" style="text-align: center;color:#7B0099" width="20%">Supplier</th>
                                                        <th class="border-top-0" style="text-align: center;color:#7B0099" width="12%">Mobile</th>
                                                        <th class="border-top-0" style="text-align: center;color:#7B0099">ที่อยู่</th>                                 
                                                        <th class="border-top-0" style="text-align: center;color:#7B0099" width="15%">จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach ($allDatas as $key => $item)
                                                        <tr class="pull-up">
                                                            <td align="center"> {{$key+1}}</td>
                                                            <td class="text-truncate">{{$item->SUP_NAME}}</td>                                                 
                                                            <td class="text-truncate">{{$item->SUP_TEL}}</td>
                                                            <td class="text-truncate">{{$item->SUP_ADDRESS}}</td>
                                                            <td>                                                                
                                                                @if((Auth::user()->user_edit) == 'on' )
                                                                    <a class="btn btn-warning btn-glow round px-2" href="{{ url('supplier/edit/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$item->SUP_ID )  }}"><i class="fas fa-fw fa-edit font-small-5" style='font-size:15px;color:white'></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                @endif
                                                                @if((Auth::user()->user_delete) == 'on' ) 
                                                                
                                                                    <a class="btn btn-danger btn-glow round px-2" title="Delete" id="suppdelete" href="{{ url('supplier/sup_destroy/'.(Auth::user()->store_id).'/'.(Auth::user()->id).'/'.$item->SUP_ID)}}" data-token="{{csrf_token()}}" data-id="{{$item->SUP_ID}}" onclick="return confirm('ต้องการที่จะลบข้อมูล ?')"><i class="fas fa-fw fa-trash font-small-5" style='font-size:15px;color:white'></i></a>
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