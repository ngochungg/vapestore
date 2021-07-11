<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
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
        $phone = Information::where('key','Phone')->first();
        $title = Information::where('key','Title')->first();
        $open = Information::where('key','Open')->first();
        $fb = Information::where('key','Facebook Link')->first();
        $ytb = Information::where('key','YouTube Link')->first();
        $email = Information::where('key','Email')->first();
        $address = Information::where('key','Address')->first();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();

        $search = $request->input('search');
        //search name
        $posts = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();
//        dd($posts);
        return view('front.home.search_home', compact('posts','sliders','categories','categoriesLimit','products'
        ,'phone','title','open','fb','ytb','email','address'));
    }

    public function search_price(Request $request)
    {

    }
}
