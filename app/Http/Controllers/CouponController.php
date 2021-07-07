<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Redirect;
session_start();


class CouponController extends Controller
{
    public function insert_coupon(){
        return view('admin.coupon.insert_coupon');
    }

    public function insert_coupon_code(Request $request){
        $data = $request ->all();
        $coupon = new Coupon;

        $coupon->coupon_name=$data['coupon_name'];
        $coupon->coupon_number=$data['coupon_number'];
        $coupon->coupon_code=$data['coupon_code'];
        $coupon->coupon_time=$data['coupon_time'];
        $coupon->coupon_condition=$data['coupon_condition'];

        $coupon->save();
        session()->get('message','Add coupon successfully');
        return Redirect::to('list-coupon');
    }
    public function list_coupon(){
        $coupon= Coupon::orderby('coupon_id','DESC')->get();
//        dd($coupon);
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        return Redirect::to('list-coupon');
    }
    public function drop_coupon( Request $request){
        $coupon =session()->get('coupon');
        if ($coupon){
            $request->session()->forget('coupon');
        }

        return redirect()->back()->with('message','Remove coupon successfully');
    }

}
