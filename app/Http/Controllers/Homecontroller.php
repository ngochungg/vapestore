<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Homecontroller extends Controller
{
    private $comment;
    private $product_comment;
    private $order;
    private $DetailOrder;
    public function __construct(Comment $comment,Product $product_comment,Order $order,OrderDetails $DetailOrder)
    {
        $this->comment = $comment;
        $this->product_comment = $product_comment;
        $this->order = $order;
        $this->DetailOrder = $DetailOrder;
    }
    public function authenLogin()
    {
        if (auth()->check()){
            return Redirect::to('home');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        $sliders= Slider::latest()->get();
        $products = Product::latest()->take(6)->get();
        $categories = Category::where('parent_id',0)->get();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        return view('front.home.home',compact('sliders','categories','products', 'categoriesLimit'));
    }
    public function showDetail($id){
        $products = Product::latest()->take(6)->get();
//        $categories = Category::where('parent_id',0)->get();
        $products = Product::find($id);
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $Popular_Products= Product::all()->random(4);

        $New_Products= Product::latest()->take(10)->get();

        return view('front.product.detail',compact('products', 'categoriesLimit','Popular_Products','New_Products'));
    }
    public function comment(request $request,$id){
        $products = Product::find($id);
        $this->comment->create([
            'name' => $request->name,
            'email' => $request->email,
            'product_id'=> $products->id,
            'comment' => $request->comment,
            'product_name' => $products->name
        ]);
        return redirect()->route('seeDetails',$products->id);
    }
    public function ReComment(){
        $this->authenLogin();
        $comments = $this->comment->latest()->paginate(10);
//        $product_comments = $this->product_comment->latest();
//        dd($comments);
        return view('admin.comment.index', compact('comments'));
    }
    public function reply($id){
        $this->authenLogin();
        $comments = $this->comment->find($id);
        return view('admin.comment.reply', compact('comments'));
    }
    public function replyComment(Request $requests,$id){
        $this->authenLogin();
        $this->comment->find($id)->update([
            'reply' => $requests->reply
        ]);
        $comments = $this->comment->latest()->paginate(10);
        return view('admin.comment.index', compact('comments'));
    }

    public function profile($id){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
//        $Popular_Products= Product::all()->random(4);
        $orders = $this->order->wherecustomer_id($id)->get();
        return view('front.customer.profile', compact( 'categoriesLimit','orders'));
    }
    public function order_detail($id){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
//        $Popular_Products= Product::all()->random(4);
        $orders = $this->order->find($id);
        $DetailOrders = $this->DetailOrder->whereorder_id($id)->get();
        return view('front.customer.order_detail', compact( 'categoriesLimit','orders','DetailOrders'));
    }
    public function order_Cancel($id){
        $this->order->find($id)->update([
            'order_status'=>'Cancel'
        ]);
        return redirect()->route('order_detail',[$id]);
    }

}
