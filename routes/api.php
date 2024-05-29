<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
// Route::get('/cart', function (Request $request) {
//     // Implement your logic to fetch cart items here
//     // You can access the request data, authenticate users, or retrieve cart items as needed

//     // Example: Fetch cart items from the authenticated user
//     $user = auth()->user();
//     $cartItems = $user ? $user->cartItem : [];

//     return response()->json(['cartItems' => $cartItems]);
// })->middleware('auth:api');
// Route::get('/cartapi', function (Request $request) {
//     if( $request->user())
//     {
//         $cartItems = $request->user()->cartItem;
// $totalPrice = 0;
// foreach($cartItems as $item) {

// $totalPrice += ($item->product->price *$item->quantity);
// }
// session(['total_price' => $totalPrice]);
//     $cartItems = auth()->user()->cartItem;
//     // return $cartItems;
//     // dd($cartItems);
//     // return view('cart')->with ('cartItems',$cartItems)->with('totalPrice',$totalPrice);
//     // return view('carts')->with ('cartItems',$cartItems)->with('totalPrice',$totalPrice);
//     return response()->json(['cartItemss' => $cartItems,'totalPrice'=>$totalPrice]);
// // }
   
//     }
//     else {
//     $cart = session('cart',[]);
  
//     foreach ($cart as &$item) {
//         $product = Product::find($item['product_id']);
       
        
//         // Add the product and variation details to the cart item
//         $item['product'] = $product;
//     }
//     // return $cart;

//     // return view('cart1')->with('cartItems', $cart)->with('totalMrp',$totalMrp)->with('discount', $discount)->with('total', $total);
// //    return $cart;

//     // return view('cart1')->with ('cartItems',$cart);
//     return response()->json(['cartItemsse' => $cart]);
// }

    
// });



Route::get('/cartapi', function (Request $request) {
    // Implement your logic to fetch cart items here
    // You can access the request data, authenticate users, or retrieve cart items as needed

    // Example: Fetch cart items from the authenticated user
    $user = $request->user();
    $cart = session('cart',[]);
    // return response()->json(['$user'=>$user]);
    return response()->json(['$cart'=>$cart]);
    $cartItems = $user ? $user->cartItem : [];

    return response()->json(['cartItems' => $cartItems]);
});