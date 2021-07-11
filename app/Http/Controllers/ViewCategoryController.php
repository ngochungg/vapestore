<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use App\Models\Product;
use Illuminate\Http\Request;

class ViewCategoryController extends Controller
{
    public function index($categoryId) {
        $categoriesLimit = Category::where('parent_id',0)->take(3)->get();
        $phone = Information::where('key','Phone')->first();
        $title = Information::where('key','Title')->first();
        $open = Information::where('key','Open')->first();
        $fb = Information::where('key','Facebook Link')->first();
        $ytb = Information::where('key','YouTube Link')->first();
        $email = Information::where('key','Email')->first();
        $address = Information::where('key','Address')->first();
        $products = Product::where('category_id', $categoryId)->paginate(6);
        $categories = Category::where('parent_id',0)->get();
        return view('product.category.list', compact('categoriesLimit', 'products', 'categories',
            'phone','title','open','fb','ytb','email','address'));
    }
}
