<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBlog extends Model
{
    use HasFactory;
    protected $fillable= ['news_title','news_content','image','image_path'];
    protected $table='news';
    public function comment_news()
    {
        return $this->hasMany('App\Models\CommentNews','id','id_news');
    }
}
