<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    protected $fillable = ['product_id', 'file_name', 'file_path'];
    
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
