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
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            /* font-family: "THSarabunNew"; */
        }
        table {
        border-collapse: collapse;
        }
        table, th, td {
        border: 1px solid black;
        }
    </style>
</head>

<body>
<br>
<center>
    <div class="block" style="width: 90%;">
        <div class="row">
            <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
           <div class="col-md-1">
                <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($drugs->DRUG_CODE, 'QRCODE',5,5) . '" alt="qrrcode"  height="50px" width="50px" />'; ?>
           </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>
   <div class="row">
            <div class="col-md-2">
                  {{$drugs->DRUG_CODE }}
                <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
               {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                 {{$drugs->DRUG_NAME }}
            </div>
            <div class="col-md-2">
                    {{$drugs->DRUG_CODE }}
                    <?php echo DNS2D::getBarcodeHTML($drugs->DRUG_CODE, 'QRCODE',5,5);  ?>
                  {{$drugs->DRUG_NAME }}
            </div>
        </div>
   <br>


    </center>
@endsection
