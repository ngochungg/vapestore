<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function search_name(Request $request){
        $sliders= Slider::latest()->get();
        $products = Product::latest()->take(6)->get();
        $categories = Category::where('parent_id',0)->get();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();

        $search = $request->input('search');
        //search name
        $posts = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();
//        dd($posts);
        return view('front.home.search_home', compact('posts','sliders','categories','categoriesLimit','products'));
    }

    public function search_price(Request $request)
    {

    }
}
