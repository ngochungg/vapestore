<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Carbon;
use App\Models\Product;
use App\Models\Cart;
session_start();

class CheckoutController extends Controller
{

    //front-end
    public function authenLogin()
    {
        if (auth()->check()) {
            return redirect()->to('home');
        }
        return view('login');
    }

    public function loginAdmin()
    {
        if (auth()->check()) {
            return redirect()->to('home');
        }
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (auth()->attempt([
            'username' => $request->username,
            'password' => $request->password,
            'role' => 1
        ], $remember)) {
            return redirect()->to('/');
        } elseif (auth()->attempt([
            'username' => $request->username,
            'password' => $request->password,
            'role' => 2
        ], $remember)) {
            return redirect()->to('home');
        } else {
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

    public function payment()
    {
        $test = session('cart');
        if(isset($test)) {
            $carts = session()->get('cart');
            $categoriesLimit = Category::where('parent_id', 0)->take(5)->get();
            $phone = Information::where('key','Phone')->first();
            $title = Information::where('key','Title')->first();
            $open = Information::where('key','Open')->first();
            $fb = Information::where('key','Facebook Link')->first();
            $ytb = Information::where('key','YouTube Link')->first();
            $email = Information::where('key','Email')->first();
            $address = Information::where('key','Address')->first();
            return view('front.cart.payment', compact('categoriesLimit',
                'carts','phone','title','open','fb','ytb','email','address'));
        } else {
            return Redirect::route('homef');
        }


    }

    public function order_place(Request $req)
    {

        //insert payment_method
        $data = array();

        $data['payment_method'] = $req->payment_option;
        $data['payment_status'] = 'Processing';
        $payment_id = DB::table('payment')->insertGetId($data);

        $carts = session()->get('cart');
        $total = 0;
        foreach ($carts as $cartItem) {
            $total += $cartItem['price'] * $cartItem['quantity'];
        }

        $test = session('cart');

        if(isset($test)) {
            if($data['payment_method'] != 'Paypal') {
                //insert order
                $order_data = array();
                $order_data['customer_id'] = Auth::id();
                $order_data['payment_id'] = $payment_id;
                $order_data['order_total'] = $total;
                $order_data['order_status'] = 'New order';
                $order_data['created_at'] = Carbon\Carbon::now();
                $order_data['order_code'] = substr(md5(microtime()),rand(0,26),5);
                $order_data['delivery_address'] = $req->delivery_address;
                $order_id = DB::table('orders')->insertGetId($order_data);


                //insert order details
                foreach ($carts as $id => $cartItem) {
                    $order_d_data = array();
                    $order_d_data['order_id'] = $order_id;
                    $order_d_data['product_id'] = $id;
                    $order_d_data['product_name'] = $cartItem['name'];
                    $order_d_data['product_price'] = $cartItem['price'];
                    $order_d_data['product_sales_quantity'] = $cartItem['quantity'];
                    DB::table('order_details')->insert($order_d_data);
                    DB::update(
                        'update products set quantity = quantity - ? where id = ?',
                        [$cartItem['quantity'], $id]
                    );
                }

                //infor
                $categoriesLimit = Category::where('parent_id', 0)->take(5)->get();
                $phone = Information::where('key','Phone')->first();
                $title = Information::where('key','Title')->first();
                $open = Information::where('key','Open')->first();
                $fb = Information::where('key','Facebook Link')->first();
                $ytb = Information::where('key','YouTube Link')->first();
                $email = Information::where('key','Email')->first();
                $address = Information::where('key','Address')->first();
                $req->session()->forget('cart');

                return view('front.cart.thankyou', compact('categoriesLimit','phone','title','open','fb','ytb','email','address'));
            } else {
                //insert order
                $order_data = array();
                $order_data['customer_id'] = Auth::id();
                $order_data['payment_id'] = $payment_id;
                $order_data['order_total'] = $total;
                $order_data['order_status'] = 'New order';
                $order_data['created_at'] = Carbon\Carbon::now();
                $order_data['order_code'] = substr(md5(microtime()),rand(0,26),5);
                $order_data['delivery_address'] = $req->delivery_address;
                $order_id = DB::table('orders')->insertGetId($order_data);


                //insert order details
                foreach ($carts as $id => $cartItem) {
                    $order_d_data = array();
                    $order_d_data['order_id'] = $order_id;
                    $order_d_data['product_id'] = $id;
                    $order_d_data['product_name'] = $cartItem['name'];
                    $order_d_data['product_price'] = $cartItem['price'];
                    $order_d_data['product_sales_quantity'] = $cartItem['quantity'];
                    DB::table('order_details')->insert($order_d_data);
                }
                return Redirect::route('paywithpaypal');
            }
        } else {
            return Redirect::route('homef');
        }
    }

    //back-end
    public function index()
    {
        $this->authenLogin();
        $all_order = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->orderby('orders.order_id')->get()->where('order_status','LIKE', 'New order');
        return view('admin.order.index', compact('all_order'));
    }

    public function details($id)
    {
        $this->authenLogin();
        $order_by_id = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->join('payment','orders.payment_id','=','payment.payment_id')
            ->select('orders.*', 'users.*', 'order_details.*','payment.*')
            ->get()->where('order_id', 'LIKE', $id);
//        $check_cart = session()->get('cart');
//        dd($order_by_id);
        $payment = DB::table('orders')->get()->where('order_id', 'LIKE', $id);
        $customer_info = DB::table('orders')
            ->join('users', 'orders.customer_id','=','users.id')
            ->join('payment','orders.payment_id','=','payment.payment_id')
            ->get()->where('order_id', 'LIKE', $id);
        return view('admin.order.view_order', compact('order_by_id','id','payment','customer_info'));
    }

    public function processing($order_id, Request $req){
        $this->authenLogin();
//        dd($order_id);
        Order::find($order_id)->update([
            'order_status' => $req->order_status,
        ]);
        return redirect()->route('order.index');
    }

    public function processing_order() {
        $this->authenLogin();
        $all_order = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->orderby('orders.order_id')->get()->where('order_status','LIKE', 'Processing');
        return view('admin.order.processing_order', compact('all_order'));
    }

    public function complete_order() {
        $this->authenLogin();
        $all_order = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->get()->where('order_status','LIKE', 'Processed');
        return view('admin.order.complete_order', compact('all_order'));
    }

    public function cancel_order() {
        $this->authenLogin();
        $all_order = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->orderby('orders.order_id')->get()->where('order_status','LIKE', 'Cancel');
        return view('admin.order.cancel_order', compact('all_order'));
    }
}
