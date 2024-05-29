<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function Order_Item(){
        return $this->hasMany(Order_item::class);
    }
    public function Shipping_address(){
        // return $this->hasOne(Shipping_address::class);
        return $this->belongsTo(Shipping_address::class, 'shipping_address_id');
    }
    
    public function User(){
        return $this->belongsTo(User::class);
    }
}
