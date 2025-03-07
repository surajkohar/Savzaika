<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];
    use HasFactory;
    
public function media(){
    return $this->hasOne(ProductMedia::class);
}

}
