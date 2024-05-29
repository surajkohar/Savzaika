<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Product $product ){
        $products = Product::paginate(12);
        return view('product')->with('products',$products);

    }
    public function productDetails(Product $product) {
  
        return view('productDetail')->with('product',$product);

    }
   
    
}
