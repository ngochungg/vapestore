<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable = ['order_id','customer_id','payment_id','order_total','order_status','order_code','delivery_address'];
    protected $primaryKey= 'order_id';
    public function customer(){
        return $this->belongsTo('App\Models\User','customer_id','id');
    }
    public function order_detail()
    {
        return $this->hasMany('App\Models\OrderDetails','order_id','order_id');
    }
}
