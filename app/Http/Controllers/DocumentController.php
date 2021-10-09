<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Permiss;
use Image;
use PDF;
use Auth;

class DocumentController extends Controller
{
    public function index_recieve(Request $request)
    {
        $year = date('Y');
        $idstore =  Auth::user()->store_id;
        $iduser =  Auth::user()->id;

        $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')
        ->where('users.store_id','=',$idstore)->get();

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();

        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pm =  DB::table('permiss')->get();
        $permiss_list =  DB::table('permiss_list')->get();
        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('document.index_recieve',[
            'data_hos'=>$data_hos,'pms'=>$pm,'permiss_list'=>$permiss_list,   'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'allData' => $allData,

        ]);



    }
}
