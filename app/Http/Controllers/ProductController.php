<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use DeleteModelTrait;
    function addToCart(Request $req) {
//        if($req->session()->has('user')) {
//            $cart = new Cart;
//            $cart-> user_id = $req->session()->has('user')['id'];
//            $cart-> product_id = $req->product_id;
//            $cart->save();
//            return redirect('/home');
//        } else {
//            return redirect('/login');
//        }
        $cart= new Cart;
        $cart-> product_id = $req->product_id;
        $cart->save();
        return redirect('cart');
    }

    function cartsList() {
        $cart = Cart::all();
        $categoriesLimit = Category::where('parent_id',0)->take(3)->get();
        $products= DB::table('cart')
//            ->join('products', 'cart.product_id','=', 'products.id')
//            ->where('cart.user_id')
//            ->select('products.*')
//            ->get();
            ->join('products', 'cart.product_id','=', 'products.id')
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('front.cart.cartsList', compact('products', 'categoriesLimit', 'cart'));
    }

    function removeCart($id) {
        Cart::destroy($id);
        return redirect('cart');
    }

}
