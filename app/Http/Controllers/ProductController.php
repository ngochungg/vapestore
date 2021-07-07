<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use App\Models\Information;
use App\Models\Product;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use DeleteModelTrait;
    public function addToCart(Request $req) {

        $product = Product::find($req->id);
        $cart = session()->get('cart');
        if (isset($cart[$req->id])) {
            $cart[$req->id]['quantity'] = $cart[$req->id]['quantity'] + $req->quantity;
        } else {
            $cart[$req->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $req->quantity,
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
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $phone = Information::where('key','Phone')->first();
        $title = Information::where('key','Title')->first();
        $open = Information::where('key','Open')->first();
        $fb = Information::where('key','Facebook Link')->first();
        $ytb = Information::where('key','YouTube Link')->first();
        $email = Information::where('key','Email')->first();
        $address = Information::where('key','Address')->first();
        $carts = session()->get('cart');
        return view('front.cart.cartsList',compact('carts', 'categoriesLimit','phone','title',
            'open','fb','ytb','email','address'));
    }

    public function updateCart(Request $req) {
    $carts = session()->get('cart');
    if($req->id && $req->quantity) {
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
