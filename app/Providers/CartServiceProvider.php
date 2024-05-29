<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    //     View::composer('*', function ($view) {
    //         if( auth()->user())
    //     {
    //         $cartItems = auth()->user()->cartItem;
    // $totalPrice = 0;
    // foreach($cartItems as $item) {

    // $totalPrice += ($item->product->price *$item->quantity);
    // }
    // session(['total_price' => $totalPrice]);
    //     $cartItems = auth()->user()->cartItem;
 
    //     $view->with('cartItems', $cartItems)->with('totalPrice', $totalPrice);

    //     }
    //     else {
    //     $cart = session('cart',[]);
      
    //     foreach ($cart as &$item) {
    //         $product = Product::find($item['product_id']);
       
    //         $item['product'] = $product;
    //     }

       
    //     $view->with('cartItems', $cart);
    // }
          
    //     });
    }
}
