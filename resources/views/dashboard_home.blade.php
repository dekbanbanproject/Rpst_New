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
        $idd_user = Auth::user()->id;
        // $idstore =  Auth::user()->store_id;
    }else{
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos);

?>
<style>
      .dataTables_wrapper   .dataTables_filter{
        float: right 
        }

    .dataTables_wrapper  .dataTables_length{
            float: left 
        }
        .dataTables_info {
            float: left;
        }
        .dataTables_paginate{
            float: right
        }
</style>
<?php      
      date_default_timezone_set("Asia/Bangkok");
      $date = date('Y-m-d');
?>
 <div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

             
                <div class="content-overlay"></div>
                        <div class="content-wrapper">
                            <div class="content-header row">
                            </div>
                            <div class="content-body">

                                <div id="crypto-stats-3" class="row">
                                    <div class="col-xl-4 col-12">
                                        <div class="card crypto-card-3 pull-up">
                                            <div class="card-content">
                                                <div class="card-body pb-0">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fas fa-swatchbook warning font-large-2" title="BTC"></i>
                                                        </div>
                                                        <div class="col-7 pl-2">
                                                            <h4>เอกสารที่รับเข้าทั้งหมด</h4>
                                                            <h6 class="text-muted">Document Recieve</h6>
                                                        </div>
                                                        <div class="col-3 text-right">
                                                            <h4>9,980</h4>
                                                            <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12"><canvas id="btc-chartjs" class="height-75"></canvas></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-12">
                                        <div class="card crypto-card-3 pull-up">
                                            <div class="card-content">
                                                <div class="card-body pb-0">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fas fa-paper-plane blue-grey lighten-1 font-large-2" title="ETH"></i>
                                                        </div>
                                                        <div class="col-7 pl-2">
                                                            <h4>เอกสารที่ส่งทั้งหมด</h4>
                                                            <h6 class="text-muted">Document Sended</h6>
                                                        </div>
                                                        <div class="col-3 text-right">
                                                            <h4>944</h4>
                                                            <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12"><canvas id="eth-chartjs" class="height-75"></canvas></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-12">
                                        <div class="card crypto-card-3 pull-up">
                                            <div class="card-content">
                                                <div class="card-body pb-0">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fas fa-bell info font-large-2" title="XRP"></i>
                                                        </div>
                                                        <div class="col-7 pl-2">
                                                            <h4>รายการที่ประกาศทั้งหมด</h4>
                                                            <h6 class="text-muted">Document Declare</h6>
                                                        </div>
                                                        <div class="col-3 text-right">
                                                            <h4>12</h4>
                                                            <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12"><canvas id="xrp-chartjs" class="height-75"></canvas></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                </div>


            </div>
        </div>
    </div>
  </div>
  <!-- END: Content-->

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