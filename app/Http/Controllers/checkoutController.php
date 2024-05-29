<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;

use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function checkout(){
     
            if(url()->previous() != route('carts.index')){
            session()->forget('discountAmmount');
            
            }

      $checkoutDeatils = session()->get('discountAmount');
      // dd($checkoutDeatils);
      if(auth()->check()){
        // $cartItems = Cart::all();
        $cartItems = auth()->user()->cartItem;
        // dd($checkoutDeatils);
        return view('order.checkout', compact('cartItems'));
        // return view('order.checkout', compact('cartItems'))->with('couponDiscountAmount', $checkoutDeatils);
      }
      else
      {
        //   $cartItems=session()->all();
        $cart = session('cart',[]);
        // $cartItems=session()->get('cart');
        //   dd( $cartItems);
          foreach ($cart as &$item) {
            $product = Product::find($item['product_id']);
            $item['product'] = $product;
            // dd( $item);
        }
        return view('order.checkout')->with('cartItems', $cart);
          // return view('order.checkout')->with('cartItems', $cart)->with('couponDiscountAmount', $checkoutDeatils);
      }
   
    // dd($cartItems);
    }
}
