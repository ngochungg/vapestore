<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class OnlineHelpController extends Controller
{
    public function online(){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        return view('onlinehelp',compact('categoriesLimit'));
    }
}
