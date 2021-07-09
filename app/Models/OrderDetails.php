<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = ['order_details_id','order_id','product_id','product_name','product_price','product_sales_quantity'];
//    protected $primaryKey= 'order_details_id';
    protected $table='order_details';
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id','order_id');
    }
}
