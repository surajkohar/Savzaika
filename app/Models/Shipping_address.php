<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{
    protected $guarded = [];
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order(){
        // return $this->belongsTo(Order::class);
        return $this->hasOne(Order::class, 'shipping_address_id');
    }
}
