<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MongoDB\Driver\Session;


class AdminController extends Controller
{
    public function authenLogin()
    {
        if (auth()->check()){
           return Redirect::to('home');
        }else{
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
            'email'=>$request->email,
            'password'=>$request->password
        ],$remember)){
            return redirect()->to('home');
        }else{
            $message = ['Account password is wrong Please re-enter!'];
            return view('login');
        };
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin');
    }
    public function showHome () {
       $this->authenLogin();
       return view('admin.home');
    }

}
