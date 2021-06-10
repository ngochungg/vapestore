<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function contact(){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        return view('contact-us',compact('categoriesLimit'));
    }

}
