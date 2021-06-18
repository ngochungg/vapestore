<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{

    //front-end
    public function authenLogin(){
        if (auth()->check()){
            return redirect()->to('home');
        }
        return view('login');
    }
    public function postLoginAdmin(Request $request){
        $remember=$request->has('remember') ?true:false;
        if (auth()->attempt([
            'username'=>$request->username,
            'password'=>$request->password,
            'role' => 1
        ],$remember)){
            return redirect()->to('/');
        }
        elseif(auth()->attempt([
            'username'=>$request->username,
            'password'=>$request->password,
            'role' => 2
        ],$remember)){
            return redirect()->to('home');
        }
        else{
            return redirect()->to('admin')->with('message', 'Incorrect username or password');
        };
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function payment() {
        $carts = session()->get('cart');
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        return view('front.cart.payment', compact('categoriesLimit', 'carts'));
    }

    public function order_place(Request $req){
        //insert payment_method

        $data = array();
        $data['payment_method'] = $req->payment_option;
        $data['payment_status'] = 'Processing';
        $payment_id = DB::table('payment')->insertGetId($data);

        $carts = session()->get('cart');
        foreach($carts as  $cartItem) {
            $total = 0;
            $total += $cartItem['price'] * $cartItem['quantity'];
        }

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Auth::id();
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = $total;
        $order_data['order_status'] = 'Processing';
        $order_id = DB::table('order')->insertGetId($order_data);


        //insert order details
//        $carts = session()->get('cart');
        foreach($carts as $id => $cartItem) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $id;
            $order_d_data['product_name'] = $cartItem['name'];
            $order_d_data['product_price'] = $cartItem['price'];
            $order_d_data['product_sales_quantity'] = $cartItem['quantity'];
            DB::table('order_details')->insert($order_d_data);
        }
        $req->session()->forget('cart');
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        return view('front.cart.thankyou', compact('categoriesLimit'));
    }

    //back-end
    public function index() {
        $this->authenLogin();
        $all_order = DB::table('order')
            ->join('users','order.customer_id','=','users.id')
            ->select('order.*','users.name')
            ->orderby('order.order_id')
            ->get();
        return view('admin.order.index',compact('all_order'));
    }

}
