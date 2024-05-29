<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class CartController extends Controller
{

  
    public function updateQuantity(Request $request)
    {
     
    
        $quantity = $request->input('quantity');
   
        return response()->json(['message' => 'Quantity updated successfully']);
    }
    public function index()
    {
        
        // dd(auth()->user()->cartItem());
        if( auth()->user())
        {
            $cartItems = auth()->user()->cartItem;
    $totalPrice = 0;
    foreach($cartItems as $item) {

    $totalPrice += ($item->product->price *$item->quantity);
    }
    session(['total_price' => $totalPrice]);
        $cartItems = auth()->user()->cartItem;
       
        return view('cart')->with ('cartItems',$cartItems)->with('totalPrice',$totalPrice);

       
        }
        else {
        $cart = session('cart',[]);
       
      
        foreach ($cart as &$item) {
            $product = Product::find($item['product_id']);
   
            $item['product'] = $product;
        }
        // return $cart;
$totalPrice = 0;
foreach($cart as &$item) {

$totalPrice += ($item['product']->price *$item['quantity']);
}
// return $cart;
        return view('cart1')->with ('cartItems',$cart)->with('totalPrice',$totalPrice);
    }
        //
    }
    public function addToCart(Product $product ,Request $request){
  
    if($request->input('passingQuantity')){
        $quantity = $request->input('passingQuantity');

    }
    else{
        $quantity = 1;
    }
    // dd($quantity);
        if( auth()->user()){
            $cartItems = auth()->user()->cartItem();

            // $cartItems = auth()->user()->cartItem;
            // dd( $cartItems);
            foreach (auth()->user()->cartItem as $cartItem) {
                if ($cartItem->product_id === $product->id) {
                    Toast::success('Product already exists!')->autoDismiss(2);
                    return redirect()->back();
                }
            }

        $cartItems->updateOrCreate([

    'product_id' => $product->id,
    'quantity'=>$quantity,

]);
Toast::success('Sucessfully added to the cart')->autoDismiss(2);
return redirect()->back();
        }
        
// or this 
//         Cart::create([
//             'user_id'=>auth()->user()->id,
//     'product_id' => $product->id,
//     'quantity'=>1,

// ]);
else {

$cart = session('cart', []);

// Check if the product is already in the cart
$found = false;
foreach ($cart as &$cartItem) {
    if ($cartItem['product_id'] == $product->id) {
        // Product is already in the cart, update the quantity
        $cartItem['quantity']++;
        $found = true;
        break;
    }
}

if (!$found) {
    // If the product is not in the cart, add it
    $cart[] = [
        'product_id' => $product->id,
        'quantity' => $quantity,
        'amount' => $product->price
    ];
}

session(['cart' => $cart]);

if ($found) {
    Toast::success('Quantity updated in the cart')->autoDismiss(2);
} else {
    Toast::success('Product added to the cart successfully')->autoDismiss(2);
}

return redirect()->back();
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $quantity = $request->input('quantity');
        $product_id = intval($request->input('productID'));
        // dd($quantity,$product_id);
        $cartItems = auth()->user()->cartItem;
        // dd(['cartitems'=>$cartItems ,'product_id'=>$product_id]);
     
        foreach ($cartItems as $cartItem) {
            if ($cartItem->product_id == $product_id) {
                
                $cartItem->update([
                    'quantity' => $quantity
                ]);
                return response()->json([
                    'cartItem' => $cartItem,
                    'productDetails'=>$cartItem->product
                ]);
            }
            else {
                dd('doesnt found product');
            }
        }
        
     

        
    }
    public function updateSessionCart($cart, Request $request)
    {
        $carts = session('cart', []);
        
        foreach ($carts as &$item) {
            if ($item['product_id'] == $cart) {
                $item['quantity'] = request('quantity');
                break;
            }
        }
        session(['cart' => $carts]);
      
        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        Toast::success('Sucessfully Deleted')->autoDismiss(2);
        return redirect()->back();
        //
    }
    public function flushSessionCart () {
        session()->forget('cart');
        Toast::success('Sucessfully flushed')->autoDismiss(2);
        return redirect()->back();
    }
    public function deleteSessionCart( $id ){
        // return $id;
        $cart = session('cart', []);
    
        // Remove the item from the cart
        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['product_id'] != $id;
        });
    
        // Update the cart in the session
        session(['cart' => $cart]);
        
        // Redirect back to the cart page or wherever is appropriate
      
        return redirect()->back();
    }

public function applyCoupon(Request $request){
    // dd($request->all());
    $totalPrice1 = 0;
    // dd($request->all());
    if(auth()->check()){

        foreach(auth()->user()->cartItem as $item){
            
            $totalPrice1 += ($item->product->price * $item->quantity);
            
        }
        
    }
    else{
        $cart = session('cart',[]);
        // return $cart;
        $checkoutDeatils = session('checkoutDeatils',[]);
  
        foreach ($cart as &$item) {
            $product = Product::find($item['product_id']);
   
            $item['product'] = $product;
        }

       foreach($cart as &$item) {

        $totalPrice1 += ($item['product']->price *$item['quantity']);
       }
    }


    // $totalPrice = request('total_price');
    $totalPrice =  $totalPrice1;

    $couponCode  = request('coupon_code');
//    dd(['couponCode'=>$couponCode,'totalPrice'=>$totalPrice]);
    $coupon = Coupon::where('coupon_code', $couponCode)->first();

    // Assuming you have the order total
    $orderTotal = $totalPrice; // Replace with your actual order total
    
    // Calculate the discount amount
    $discountAmount = 0;
    
    if ($coupon) {
         $minimumAmount = $coupon->minimum_amount;
        $currentDate = Carbon::now();
        $startDate = Carbon::parse($coupon->start_date);
        $expirationDate = Carbon::parse($coupon->expiration_date);
    
        if ($coupon->is_active && $currentDate >= $startDate && $currentDate <= $expirationDate) {
            if ($coupon->coupon_type === 'percentage') {
                // Percentage discount
                if($orderTotal < $minimumAmount){
                    $discountAmount = 0;
                    session()->put('discountAmount', $discountAmount);
                    return response()->json(['error' => 'Cant apply coupon for $'. $orderTotal]); 
                }
                else{
                    $discountAmount = ($coupon->discount_value / 100) * $orderTotal;
               
                    session()->put('discountAmount', $discountAmount);
                    session()->put('couponId', $coupon->id);
                }
                // $checkoutDeatils['discountAmount'] =$discountAmount;
            } elseif ($coupon->coupon_type === 'fixed') {
                // Fixed discount
                if($orderTotal < $minimumAmount){
                    $discountAmount = 0;
                    session()->put('discountAmount', $discountAmount);
                    return response()->json(['error' => 'Cant apply coupon for $'. $orderTotal]); 
                }
                else{

                    $discountAmount = $coupon->discount_value;
                    session()->put('couponId', $coupon->id);
                    session()->put('discountAmount', $discountAmount);
                    // $checkoutDeatils['discountAmount'] =$discountAmount;
                }
            }


    
            // Ensure the discount amount doesn't exceed the order total
            // $discountAmount = min($discountAmount, $orderTotal);
        }
      }
    else{
        // return redirect()->back()->with('error', 'Invalid coupon code') ;
        return response()->json(['error' => 'Invalid coupon code']);
    }
    // dd($checkoutDeatils);
  
      return response()->json(['totalAmount'=>$orderTotal,'discountAmount' => $discountAmount,'subTotal' => $orderTotal-$discountAmount]);

        }

        public function updateCart(Cart $cart , Request $request){
            // dd($request->all());
            $cart->update([
                'quantity'=>$request->quantity
            ]);
            
        }

}
