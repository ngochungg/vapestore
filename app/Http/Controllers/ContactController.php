<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $info;
    public function __construct(Information $info)
    {

        $this->info = $info;
    }
    public function contact(){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $phone = $this->info->where('key','Phone')->first();
        $title = $this->info->where('key','Title')->first();
        $open = $this->info->where('key','Open')->first();
        $fb = $this->info->where('key','Facebook Link')->first();
        $ytb = $this->info->where('key','YouTube Link')->first();
        $email = $this->info->where('key','Email')->first();
        $address = $this->info->where('key','Address')->first();
        return view('contact-us',compact('categoriesLimit','phone','title','open','fb','ytb','email','address'));
    }

}
