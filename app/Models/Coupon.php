<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Coupon extends Model
{
    public $timestamps = false;
    protected $fillable =['coupon_name', 'coupon_code','coupon_time','coupon_number','coupon_condition'];
    protected $primaryKey = 'coupon_id';
    protected $table = 'coupon';
}
