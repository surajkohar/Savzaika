<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['coupon_name','minimum_amount','coupon_code','coupon_type','discount_value','start_date','expiration_date','is_active','usage_limit'];

    use HasFactory;
}
