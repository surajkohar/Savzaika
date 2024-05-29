@extends('layouts.layout')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex flex-col md:flex-row shadow-md my-10">
        <div class="md:w-3/4 bg-white px-4 md:px-10 py-6 md:py-10">
            <div class="flex justify-between border-b pb-4 md:pb-8">
                <h1 class="font-semibold text-xl md:text-2xl">Your Cart</h1>
                <h2 class="font-semibold text-xl md:text-2xl"> Total Products({{$cartItems->count()}}) </h2>
            </div>
            <div class="mt-4 md:mt-10 mb-5">
                <div class="flex justify-between border-b pb-4">
                    <h3 class="font-semibold text-gray-600 text-xs md:text-sm uppercase w-2/5">Product</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Quantity</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Price</h3>
                    {{-- <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Total
                        Price
                    </h3> --}}
                </div>

                <div class="flex flex-col py-2 md:py-4">
                    @foreach ($cartItems as $cartItem )
                    <div class="flex items-center hover:bg-gray-100 -mx-2 md:mx-0 px-4 md:px-6 py-3 md:py-5 ">
                        <div class="flex w-2/5 ">
                            <div class="w-16 md:w-20">
                                <img class="h-20 md:h-24"
                                    src="{{asset('storage/'.$cartItem->product->media->file_path)}}" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-3 md:ml-4 flex-grow s">
                                <span class="font-semibold text-sm md:text-base">{{$cartItem->product->name}}</span>
                                <span
                                    class="text-gray-500 text-xs md:text-sm category">{{Str::limit($cartItem->product->description,'50')}}</span>
                                <Link href="{{ route('deleteCartItem', $cartItem) }}" method="DELETE"
                                    class="font-semibold hover:text-red-500 text-gray-500 text-xs md:text-sm">Remove
                                </Link>
                            </div>
                        </div>

                        <div class="flex justify-center w-2/5 ">
                            {{-- <span class="text-center w-1/5 font-semibold text-xs md:text-sm">1</span> --}}
                            {{-- <x-splade-form stay preserve-scroll submit-on-change="quantity"
                                :default="['quantity'=>$cartItem->quantity]"
                                action="{{ route('updateCart', ['cart'=>$cartItem]) }}" method="PUT" class=" ">
                                <div class=" wrapper flex flex-row space-x-16 ">


                                    <div class="left-part ">


                                        <button id="incdecButton"
                                            class="  text-gray-500 focus:outline-none focus:text-gray-600"
                                            @click="`${form.quantity++}`">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>

                                        <span class="text-gray-700 mx-2" v-text="`${form.quantity}`"></span>
                                        <button id="incdecButton"
                                            class="text-gray-500 focus:outline-none focus:text-gray-600"
                                            @click="`${form.quantity > 1 ? form.quantity-- : 1}`">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </x-splade-form> --}}
                            <x-splade-form stay preserve-scroll submit-on-change="
                                quantity" :default="['quantity'=>$cartItem->quantity]"
                                action="{{ route('updateCart', ['cart'=>$cartItem]) }}" method="PUT" class=" "
                                @success="$splade.emit('quantity_updated')">
                                <div class=" flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0
                                sm:space-x-4">
                                    <button class="bg-gray-300 text-gray-600 px-2 py-1 rounded sm:px-3 sm:py-2"
                                        @click="`${form.quantity > 1 ? form.quantity-- : 1}`"
                                        id="decrementQuantity">-</button>
                                    <span type="text" class="border text-center w-10 sm:w-14" id="quantity"
                                        v-text="`${form.quantity}`"> </span>
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded sm:px-3 sm:py-2"
                                        @click="`${form.quantity++}`" id="incrementQuantity">+</button>
                                    <input type="text" id="cart_productId" hidden value="{{$cartItem->product->id}}">
                                </div>
                            </x-splade-form>



                        </div>
                        <span class="text-center w-1/5 font-semibold text-xs md:text-sm"
                            id="productPrice">${{$cartItem->product->price}}</span>
                        {{-- <span class="text-center w-1/5 font-semibold text-xs md:text-sm "
                            id="totalProductPrice">${{$cartItem->product->price*$cartItem->quantity}}</span> --}}
                    </div>
                    @endforeach

                </div>

            </div>
            @php
            $totalPrice1 = 0;
            @endphp

            @foreach($cartItems as $item)
            @php
            $totalPrice1 += ($item->product->price * $item->quantity);
            @endphp
            @endforeach

            <div class="mt-6 md:mt-10 mb-5">
                <x-splade-rehydrate on="quantity_updated">
                    <div class="flex justify-between border-b pb-4">
                        <h3 class="font-semibold text-gray-600 text-xs md:text-sm uppercase w-2/5">Total Amount</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>

                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"
                            id="totalProductPrice1">
                            ${{$totalPrice1}}</h3>

                    </div>

                </x-splade-rehydrate>

                <div class="flex justify-between border-b pb-4">
                    <h3 class="font-semibold text-gray-600 text-xs md:text-sm uppercase w-2/5">Coupon Discount Amount
                    </h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>
                    <span class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5 "
                        id="discountAmount">$0</span>
                </div>
                <x-splade-rehydrate on="quantity_updated">
                    <div class=" flex justify-between border-b pb-4">
                        <h3 class="font-semibold text-gray-600 text-xs md:text-sm uppercase w-2/5">Sub Total</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>

                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"
                            id="subTotal">
                            ${{$totalPrice1}}</h3>



                    </div>
                </x-splade-rehydrate>
                <span>
                    <p class="error-msg text-red-500 text-center my-4" id="error-message">

                    </p>
                </span>
                <label for="promo" class="font-semibold block mb-2 text-xs md:text-sm uppercase">Promo Code</label>
                <div class="flex justify-between">
                    <div class="w-3/4">

                        <input type="text" placeholder="Add Coupon" id="couponCode" name="coupon_code"
                            class="w-full p-2 mr-4 border border-gray-300 rounded-md focus:outline-none">
                    </div>

                    <div class="w-1/4">
                        <button id="applyCouponButton"
                            class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 focus:outline-none">APPLY</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="summary" class="w-full md:w-1/4 px-4 md:px-8 py-6 md:py-10">
            <h1 class="font-semibold text-xl md:text-2xl border-b pb-4 md:pb-8">Order Summary</h1>
            <x-splade-rehydrate on="quantity_updated">
                <div class="flex justify-between mt-4 md:mt-10 mb-5">
                    <span class="font-semibold text-sm md:text-base uppercase">Total Amount</span>
                    <span class="font-semibold text-sm md:text-base">${{$totalPrice}}</span>
                </div>
            </x-splade-rehydrate>
            <div class="flex justify-between mt-4 md:mt-10 mb-5">
                <span class="font-semibold text-sm md:text-base uppercase">Coupon Discount Amount</span>
                <span class="font-semibold text-sm md:text-base" id="discountAmount1">$0</span>
            </div>
            <x-splade-rehydrate on="quantity_updated">
                <div class="flex justify-between mt-4 md:mt-10 mb-5">
                    <span class="font-semibold text-sm md:text-base uppercase">Sub Total</span>
                    <span class="font-semibold text-sm md:text-base " id="subTotal1">${{$totalPrice}}</span>
                </div>
            </x-splade-rehydrate>
            <div class="mt-6 md:mt-10">
                <label for="promo" class="font-semibold block mb-2 text-xs md:text-sm uppercase">Promo Code</label>
                <input type="text" id="promo" placeholder="Enter your code"
                    class="w-full p-2 text-xs md:text-sm border border-gray-300 rounded-md focus:outline-none">
                <button
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-md text-xs md:text-sm focus:outline-none mt-4">CHECKOUT</button>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
</script>


<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });      

        $('#applyCouponButton').click(function(event) {
            event.preventDefault();
            // console.log('workiong');
            var couponCode = $('#couponCode').val();
            var totalPrice = '{{$totalPrice}}';
            console.log('click is working and value is ',couponCode + ' & total',totalPrice);
            $.ajax({
                url: '/applyCoupon', // Route for applying the coupon
                method: 'POST',
                data: {
                    coupon_code: couponCode, 
                    total_price: totalPrice, 
                  
                },
                success: function(response) {
                    if(response.discountAmount){
                        console.log('working response ',response.discountAmount);
                        $('#discountAmount').text('$'+  response.discountAmount);
                        $('#discountAmount1').text('$'+  response.discountAmount);
                    $('#subTotal').text( '$'+ (totalPrice - response.discountAmount));
                    $('#subTotal1').text( '$'+ (totalPrice - response.discountAmount));
                    $('#error-message').text('Coupon Applied Sucessfully');
                  
                    }
                    else{
                        $('#error-message').text(response.error);
                    }
                    $('#couponCode').val('');
                    
                },
                error: function() {
                    
                    console.log('Unknown error');
                }
            });
            
        });
     
    });
   
</script>