<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function tags(){
        return $this
            ->belongsToMany(Tag::class,'product_tags','product_id','tag_id')
            ->withTimestamps();
    }
    public function category(){
        return $this
            ->belongsTo(Category::class,'category_id');
    }
    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function comment() {
        return $this->hasMany(Comment::class,'product_id','id');
    }
    public function commentProduct() {
        return $this->hasMany(Comment::class,'product_id');
    }
    public function product() {
        return $this->belongsTo(Comment::class,'product_id');
    }

}
