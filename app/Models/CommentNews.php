<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentNews extends Model
{
    use HasFactory;
    protected $table='comments_news';
    public function newblog(){
        return $this->belongsTo('App\Models\NewBlog','id_news','id');
    }
}
