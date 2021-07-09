<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\Information;

class Homecontroller extends Controller
{
    private $comment;
    private $product_comment;
    private $order;
    private $DetailOrder;
    private $info;
    public function __construct(Comment $comment,Product $product_comment,
                                Order $order,OrderDetails $DetailOrder,
                                Information $info)
    {
        $this->comment = $comment;
        $this->product_comment = $product_comment;
        $this->order = $order;
        $this->DetailOrder = $DetailOrder;
        $this->info = $info;
    }
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

    public function index(){
        $sliders= Slider::latest()->get();
        $products = Product::latest()->take(6)->get();
        $categories = Category::where('parent_id',0)->get();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $phone = $this->info->where('key','Phone')->first();
        $title = $this->info->where('key','Title')->first();
        $open = $this->info->where('key','Open')->first();
        $fb = $this->info->where('key','Facebook Link')->first();
        $ytb = $this->info->where('key','YouTube Link')->first();
        $email = $this->info->where('key','Email')->first();
        $address = $this->info->where('key','Address')->first();
        return view('front.home.home',compact('sliders','categories',
            'products', 'categoriesLimit',
            'phone','title','open','fb','ytb','email','address'));
    }
    public function showDetail($id){
        $products = Product::latest()->take(6)->get();
//        $categories = Category::where('parent_id',0)->get();
        $products = Product::find($id);
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
//        $Popular_Products= Product::all()->random(4);
        $phone = $this->info->where('key','Phone')->first();
        $title = $this->info->where('key','Title')->first();
        $open = $this->info->where('key','Open')->first();
        $fb = $this->info->where('key','Facebook Link')->first();
        $ytb = $this->info->where('key','YouTube Link')->first();
        $email = $this->info->where('key','Email')->first();
        $address = $this->info->where('key','Address')->first();
        $New_Products= Product::latest()->take(10)->get();
        $count=OrderDetails::where('product_id',$id)->where('rating','>',0)->count();
        //dd($count);
        $rated=OrderDetails::where('product_id',$id)->get();
        $total=0;
        foreach($rated as $rated){
               $total+=$rated->rating;
        }
        //dd($total);
        if($count==0){
            $avg=5;
        }
        else{
            $avg=round($total/$count,2);
        }
        //dd($avg);
        $id_order=OrderDetails::where('product_id',$id)->get();
        //dd($id_order);
        
        $cateID = Product::find($id)->category_id;
        $relatedProducts = Product::where('category_id',$cateID)->take(10)->get();
//        dd($relatedProducts);
//        $New_Products= Product::latest()->take(10)->get();
        return view('front.product.detail',compact('products', 'categoriesLimit','relatedProducts','New_Products', 'phone','title','open','fb','ytb','email','address','avg','id_order'));
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
        if (auth()->check()){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
//        $Popular_Products= Product::all()->random(4);
        $orders = $this->order->wherecustomer_id($id)->get();
        $phone = $this->info->where('key','Phone')->first();
        $title = $this->info->where('key','Title')->first();
        $open = $this->info->where('key','Open')->first();
        $fb = $this->info->where('key','Facebook Link')->first();
        $ytb = $this->info->where('key','YouTube Link')->first();
        $email = $this->info->where('key','Email')->first();
        $address = $this->info->where('key','Address')->first();
        return view('front.customer.profile', compact( 'categoriesLimit','orders','phone','title','open','fb','ytb','email','address'));
        }else{
                return Redirect::to('admin')->send();
        }
    }
    public function order_detail($id){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
//        $Popular_Products= Product::all()->random(4);
        $orders = $this->order->find($id);
        //dd($orders->order_status);
        $phone = $this->info->where('key','Phone')->first();
        $title = $this->info->where('key','Title')->first();
        $open = $this->info->where('key','Open')->first();
        $fb = $this->info->where('key','Facebook Link')->first();
        $ytb = $this->info->where('key','YouTube Link')->first();
        $email = $this->info->where('key','Email')->first();
        $address = $this->info->where('key','Address')->first();
        $DetailOrders = $this->DetailOrder->whereorder_id($id)->get();
        //dd($DetailOrders);
        return view('front.customer.order_detail', compact( 'categoriesLimit','orders','DetailOrders','phone','title','open','fb','ytb','email','address'));
    }
    public function order_Cancel($id){
        $this->order->find($id)->update([
            'order_status'=>'Cancel'
        ]);
        return redirect()->route('order_detail',[$id]);
    }

    public function commentDelete($id)
    {
        try {
            $this->comment->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }

    }

}
