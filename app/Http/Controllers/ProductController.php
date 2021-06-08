<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class ProductController extends Controller
{
    use DeleteModelTrait;
//    public function addToCart(Request $req) {
////        if($req->session()->has('user')) {
////            $cart = new Cart;
////            $cart-> user_id = $req->session()->has('user')['id'];
////            $cart-> product_id = $req->product_id;
////            $cart->save();
////            return redirect('/home');
////        } else {
////            return redirect('/login');
////        }
//        $cart= new Cart;
//        $cart-> product_id = $req->product_id;
//        $cart->save();
//        return redirect('cart');
//    }
    public function addToCart($id) {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' =>$product->feature_image_path,
            ];
        }
        session()->put('cart',$cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }

    public function showCart() {
//        echo"<pre>";
//        print_r(session()->get('cart'));
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
            //addtocart old
//        $cart = Cart::all();
//        $products= DB::table('cart')
////            ->join('products', 'cart.product_id','=', 'products.id')
////            ->where('cart.user_id')
////            ->select('products.*')
////            ->get();
//            ->join('products', 'cart.product_id','=', 'products.id')
//            ->select('products.*', 'cart.id as cart_id')
//            ->get();
//        return view('front.cart.cartsList', compact('products', 'categoriesLimit', 'cart'));

        //addtocart new
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $carts = session()->get('cart');
        return view('front.cart.cartsList',compact('carts', 'categoriesLimit'));
    }

    public function updateCart(Request $req) {
        if($req->id && $req->quantity) {
            $carts = session()->get('cart');
            $carts[$req->id]['quantity'] = $req->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('front.components.cart_component', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }

    public function deleteCart(Request $req) {
        if($req->id) {
            $carts = session()->get('cart');
            unset($carts[$req->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('front.components.cart_component', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }

}
