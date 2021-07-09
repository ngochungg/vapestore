<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;
class RatingController extends Controller
{
    //
    public function rating(request $req){
        //echo $req->id;
        //echo "<br>";
        //echo $req->rate;
        //echo $req->detail_id;
        $rating=OrderDetails::where('order_details_id', $req->detail_id)
          ->update(['comment' => $req->comment,'rating'=>$req->rate]);
        //dd($rating);
        return Redirect()->back();
    }
    public function show(request $req){
        $show=OrderDetails::where('order_details_id', $req->id)
          ->update(['show_order' => 1]);
          return Redirect()->back();
    }
    public function hidden(request $req){
      $hiddent=OrderDetails::where('order_details_id', $req->id)
          ->update(['show_order' => 0]);
        return Redirect()->back();
    }
}
