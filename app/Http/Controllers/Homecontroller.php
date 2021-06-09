<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(){
        $sliders= Slider::latest()->get();
        $products = Product::latest()->take(6)->get();
        $categories = Category::where('parent_id',0)->get();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();

        return view('front.home.home',compact('sliders','categories','products', 'categoriesLimit'));
    }

}
