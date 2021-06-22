<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','customer_id','payment_id','order_total','order_status'];
    protected $primaryKey= 'order_id';
}
