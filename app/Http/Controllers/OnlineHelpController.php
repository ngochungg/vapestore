<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\Request;

class OnlineHelpController extends Controller
{
    public function online(){
        $phone = Information::where('key','Phone')->first();
        $title = Information::where('key','Title')->first();
        $open = Information::where('key','Open')->first();
        $fb = Information::where('key','Facebook Link')->first();
        $ytb = Information::where('key','YouTube Link')->first();
        $email = Information::where('key','Email')->first();
        $address = Information::where('key','Address')->first();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        return view('onlinehelp',compact('categoriesLimit','phone','title','open','fb','ytb','email','address'));
    }
}
