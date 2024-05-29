@extends('layouts.layout')
{{-- @dd($couponDiscountAmount) --}}
@php
$checkoutDeatils = session('checkoutDeatils',[]);

@endphp

@section('content')
<div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
    <a href="#" class="text-2xl font-bold text-gray-800"
        style="font-family: 'Arial', sans-serif; font-style: italic;">Checkout</a>

</div>
<div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 ">
    <div class="px-4 pt-8">
        <p class="text-xl font-medium">Order Summary</p>

        <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
            @foreach ($cartItems as $cartitems)
            @if (!auth()->check())

            @php $price=($cartitems['quantity'])*($cartitems['product']->price); @endphp
            @else
            @php $price=($cartitems->quantity)*($cartitems->product->price); @endphp
            @endif
            <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                <div class="space-x-2 border-2 w-36 ">

                    @if (!auth()->check())
                    <img src="{{ asset('storage/' . $cartitems['product']->media->file_path) }}"
                        class="w-full h-full object-cover">
                    @else
                    <img src="{{ asset('storage/' . $cartitems->product->media->file_path) }}"
                        class="w-full h-full object-cover">
                    @endif

                </div>
                <div class="flex w-full flex-col px-4 py-4">
                    @if (!auth()->check())
                    <span class="font-bold">{{ $cartitems['product']->name }}</span>
                    @else
                    <span class="font-bold">{{ $cartitems->product->name }}</span>
                    @endif

                    {{-- <p class=" mt-2 font-semibold text-xs md:text-sm">${{ $price }}</p> --}}
                 @if (!auth()->check())
                <div class="flex w-full flex-col px-4 py-4">
                    <p class=" mt-2 font-semibold text-xs md:text-sm">₹ {{ $cartitems['product']->price }}</p>
                </div>
                @else          
                <div class="flex w-full flex-col px-4 py-4">
                    <p class=" mt-2 font-semibold text-xs md:text-sm">₹ {{ $cartitems->product->price}}</p>
                </div>
                @endif
                </div>

               <div style="margin-top: 3%">

                @if (!auth()->check())
                <span class="text-xs ml-6">X{{ $cartitems['quantity'] }}</span>
                @php $price=($cartitems['quantity'])*($cartitems['product']->price); @endphp
                <div class="flex w-full flex-col px-4 py-4">
                    <span class="font-semibold">₹{{  $price }}</span>
                </div>
                @else
                <span class="text-xs ml-6 ">X{{ $cartitems->quantity }}</span>
                @php $price=($cartitems->quantity)*($cartitems->product->price); @endphp
                <div class="flex w-full flex-col px-4 py-4">
                    <span class="font-semibold">₹ {{  $price }}</span>
                </div>
                @endif
              </div>
                
            </div>
            <hr>
            @endforeach

        </div>

    </div>
    <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
        {{-- @if (!auth()->check())
        <div>
            <div class="relative">
                <a href="/login"><button type="submit"
                        class="w-full rounded-md border border-gray-200 px-4 py-2 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 bg-buttonColor0 text-white font-medium hover:bg-buttonColor1  focus:ring-blue-500">Login</button></a>
            </div>
            <p style="text-align: center;">or</p>
            <div class="relative">
                <a href="/register"><button type="submit"
                        class="w-full mt-2 mb-5 rounded-md border border-gray-200 px-4 py-2 bg-buttonColor0 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 text-white font-medium hover:bg-buttonColor1   focus:ring-blue-500">Signup</button>
                </a>
            </div>
        </div>
        @endif --}}
        @if(session('error'))
        <div class="w-full p-4 bg-red-500 rounded text-white my-12">
            {{ session('error') }}
        </div>
        @endif

        <p class="text-xl font-medium">Shipping & Biliing Adress</p>
        <p class="text-gray-400">Complete your order by providing your adress details.</p>

        <form method="POST" action="{{ route('placeorder')}}">
            @csrf
            <div class="">
                <label for="name" class="mt-4 mb-2 block text-sm font-medium">Name</label>
                <div class="relative">
                    <input type="text" id="name" name="name" required
                        class="w-full rounded-md border border-gray-200 px-4 py-3   text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Name" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">

                    </div>
                </div>
                <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                <div class="relative">
                    <input type="email" id="email" name="email" required
                        class="w-full rounded-md border border-gray-200 px-4 py-3  text-sm  shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Email" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">

                    </div>
                </div>

                <label for="email" class="mt-4 mb-2 block text-sm font-medium">Phone</label>
                <div class="relative">
                    <input type="phone" id="phone" name="phone" required
                        class="w-full rounded-md border border-gray-200 px-4 py-3   text-sm  shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Phone" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">

                    </div>
                </div>

                <div class="grid grid-cols-3">
                    <div class="input-text">
                        <label for="state" class="mt-4 mb-2 block text-sm font-medium">State</label>
                        <input type="text" id="state" name="state" required
                            class="w-full rounded-md border border-gray-200 px-4 py-3  text-sm  shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="State" />
                    </div>

                    <div class="input-text">


                        <label for="city" class="mt-4 mb-2 block text-sm font-medium">City</label>
                        <input type="text" id="city" name="city" required
                            class="w-full rounded-md border border-gray-200 px-4 py-3  text-sm  shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="City" />
                    </div>
                    <div class="input-text">


                        <label for="street" class="mt-4 mb-2 block text-sm font-medium">Street</label>
                        <input type="text" id="street" name="street" required
                            class="w-full rounded-md border border-gray-200 px-4 py-3  text-sm  shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Street" />
                    </div>

                </div>


                <!-- Total -->
                @php $subtotal=0; @endphp
                @foreach ($cartItems as $cartitem)
                @if (!auth()->check())
                @php
                $subtotal = $subtotal + $cartitem['quantity'] * $cartitem['product']->price;
                @endphp
                @else
                @php
                $subtotal = $subtotal + $cartitem->quantity * $cartitem->product->price;
                @endphp
                @endif

                @endforeach

                <div class="mt-6 border-t border-b py-2">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Subtotal</p>
                        <p class="font-semibold text-gray-900">₹ {{ $subtotal }}</p>
                    </div>
                    @php
                    $couponDiscountAmount = session('discountAmount');
                    // @dd($couponDiscountAmount)
                    @endphp
                    @if ($couponDiscountAmount)
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Discount</p>
                        <p class="font-semibold text-gray-900">₹ {{ $couponDiscountAmount }}</p>
                    </div>
                    @else
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Discount</p>
                        <p class="font-semibold text-gray-900">₹ 0</p>
                    </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Shipping</p>
                        <p class="font-semibold text-gray-900">₹ 8.00</p>
                    </div>
                </div>
                @php $shipping_charge = 8;
                // $couponId = session()->get('couponId');
                $total = $subtotal + $shipping_charge-$couponDiscountAmount;
                @endphp
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Total</p>
                    <p class="text-2xl font-semibold text-gray-900">₹ {{ $total }}</p>
                </div>

                @php
                $checkoutPrice=[
                'subtotal'=>$subtotal,
                'shipping'=>$shipping_charge,
                'discount'=>$couponDiscountAmount
                // 'couponId'=>$couponId
                ];
                $checkoutDetails = session('checkoutDetails',[]);
                $checkoutDetails['checkoutPrice'] =$checkoutPrice;
                session()->put(['checkoutDetails' => $checkoutDetails]);
                // dd( $checkoutAmount)
                // $request->session()->put('subtotal', $subtotal);
                @endphp

            </div>

            <div id="errorMessage" style="display: none; color: red;">
                <h1>Please log in to place an order.</h1>
            </div>


            <button onclick="handleOrder()"
                class="w-full bg-buttonColor0 hover:bg-buttonColor1 text-white font-semibold py-2 rounded-md text-xs md:text-sm focus:outline-none my-4 p-2 ">Place
                Order</button>

            <script>
                function handleOrder() {
                    var name = document.getElementById('name').value;
                   var email = document.getElementById('email').value;
                   var phone = document.getElementById('phone').value;
                    var state = document.getElementById('state').value;
                     var city = document.getElementById('city').value;
                      var street = document.getElementById('street').value;

                      if (name && email && phone && state && city && street) {
                    // @auth
                        // User is authenticated, submit the form
                        document.getElementById('errorMessage').style.display = 'none';
                        document.querySelector('form').submit();
                    // @else
                        // User is not authenticated, show the error message
                        // event.preventDefault();
                        // document.getElementById('errorMessage').style.display = 'block';
                        // event.preventDefault();
                    // @endauth
                 }
                }
        
            </script>
        </form>



    </div>
</div>
@endsection