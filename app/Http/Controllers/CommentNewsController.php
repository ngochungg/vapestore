<?php

namespace App\Http\Controllers;
use App\Models\CommentNews;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentNewsController extends Controller
{
    //
    public function comment_news1(request $req){
        // echo $req->id;
        // echo "<br>";
        // echo $req->email;
        // echo "<br>";
        // echo $req->comment;
        $Comment=new CommentNews;
        $Comment->id_news=$req->id;
        $Comment->email=$req->email;
        $Comment->comment=$req->comment;
        $Comment->save();
        return redirect()->back();
    }
}
