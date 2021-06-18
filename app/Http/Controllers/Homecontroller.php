<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Homecontroller extends Controller
{
    private $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
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
        $products = Product::latest()->take(3)->get();
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
            'comment' => $request->comment
        ]);
        return redirect()->route('seeDetails',$products->id);
    }
    public function ReComment(){
        $this->authenLogin();
        $comments = $this->comment->latest()->paginate(10);
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

    public function profile(){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $Popular_Products= Product::all()->random(4);
        return view('front.customer.profile', compact( 'categoriesLimit','Popular_Products'));
    }

}
