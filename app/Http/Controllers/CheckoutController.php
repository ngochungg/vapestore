<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Session;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Carbon;
session_start();

class CheckoutController extends Controller
{

    public function __construct(Order $order, Payment $payment)
    {
        $this->order = $order;
        $this->payment = $payment;
    }

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
        $carts = session()->get('cart');
        $categoriesLimit = Category::where('parent_id', 0)->take(5)->get();
        return view('front.cart.payment', compact('categoriesLimit', 'carts'));
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

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Auth::id();
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = $total;
        $order_data['order_status'] = 'New order';
        $order_data['created_at'] = Carbon\Carbon::now();
        $order_data['order_code'] = substr(md5(microtime()),rand(0,26),5);
        $order_id = DB::table('orders')->insertGetId($order_data);


        //insert order details
//        $carts = session()->get('cart');
        foreach ($carts as $id => $cartItem) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $id;
            $order_d_data['product_name'] = $cartItem['name'];
            $order_d_data['product_price'] = $cartItem['price'];
            $order_d_data['product_sales_quantity'] = $cartItem['quantity'];
            DB::table('order_details')->insert($order_d_data);
        }
        $req->session()->forget('cart');
        $categoriesLimit = Category::where('parent_id', 0)->take(5)->get();
        if($data['payment_method'] != 'Paypal') {
            return view('front.cart.thankyou', compact('categoriesLimit'));
        } else {
            return view('front.cart.paypal');
        }

    }

    //back-end
    public function index()
    {
        $this->authenLogin();
        $all_order = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->orderby('orders.order_id')->get();
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
        return view('admin.order.view_order', compact('order_by_id','id'));
    }

    public function processing($order_id, Request $req){
        $this->authenLogin();
//        dd($order_id);
        Order::find($order_id)->update([
            'order_status' => $req->order_status,
        ]);
        return redirect()->route('order.index');
    }
}
