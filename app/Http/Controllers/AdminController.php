<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MongoDB\Driver\Session;


class AdminController extends Controller
{
    public function authenLogin()
    {
        if (auth()->check() && auth()->user()->role == 1){
           return Redirect::to('/')->send();
        }
        elseif (auth()->check() && auth()->user()->role == 2){
            return Redirect::to('home');
        }
        else{
           return Redirect::to('admin')->send();
        }
    }
    public function loginAdmin(){
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
    public function showHome () {
       $this->authenLogin();
        $newOrders = Order::whereorder_status('New order')->get();
        $newOrder = $newOrders->count();
        $User = User::whererole('1')->get();
        $user = $User->count();
        $Product = Product::all();
        $product = $Product->count();
        $completeOrders = Order::whereorder_status('Processed')->get();
        $complete = $completeOrders->count();
        return view('admin.home',compact('newOrder','user','product','complete'));
    }

}
