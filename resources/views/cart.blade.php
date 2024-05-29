@extends('layouts.layout')

@php
    $coupon = \App\Models\Coupon::get();
@endphp

@section('content')
    <div class="container mx-auto mt-10">
        <div class="flex flex-col md:flex-row shadow-md my-10">
            <div class="md:w-3/4 bg-white px-4 md:px-10 py-6 md:py-10">
                <div class="flex justify-between border-b pb-4 md:pb-8">
                    <h1 class="font-semibold text-xl md:text-2xl">Your Cart</h1>
                    <h2 class="font-semibold text-xl md:text-2xl"> Total Products({{ $cartItems->count() }}) </h2>
                </div>
                <div class="mt-4 md:mt-10 mb-5">
                    <div class="flex justify-between border-b pb-4">
                        <h3 class="font-semibold text-gray-600 text-xs md:text-sm uppercase w-2/5">Product</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Quantity</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Price</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Total</h3>
                    </div>

                    <div class="flex flex-col py-2 md:py-4">
                        @if ($cartItems->count() < 1)
                            <h1 class="text-3xl my-4 p-4 font-bold text-center"> Woops! Your cart is
                                empty
                            </h1>
                        @else
                            @foreach ($cartItems as $cartItem)
                                <div
                                    class=" flex items-center
                            hover:bg-gray-100 -mx-2 md:mx-0 px-4 md:px-6 py-3 md:py-5 ">
                                    <div class=" flex w-2/5 ">
                                        <Link modal href="{{ route('productDetails', $cartItem) }}">
                                        <div class=" w-16 md:w-20">
                                            <img class="h-20 md:h-24"
                                                src="{{ asset('storage/' . $cartItem->product->media->file_path) }}"
                                                alt="">
                                        </div>
                                        </Link>
                                        <div class="flex flex-col justify-between ml-3 md:ml-4 flex-grow s">

                                            <span
                                                class="font-semibold text-sm md:text-base">{{ $cartItem->product->name }}</span>

                                            <span
                                                class="text-gray-500 text-xs md:text-sm category">{{ Str::limit($cartItem->product->description, '50') }}</span>
                                            <Link href="{{ route('deleteCartItem', $cartItem) }}" method="DELETE"
                                                class="font-semibold hover:text-red-500  text-red-600 text-xs md:text-sm">
                                            Remove
                                            </Link>
                                        </div>
                                    </div>

                                    <div class="flex justify-center w-2/5 ">
                                        <x-splade-form stay preserve-scroll
                                            submit-on-change="
                                quantity" :default="['quantity' => $cartItem->quantity]"
                                            action="{{ route('updateCart', ['cart' => $cartItem]) }}" method="PUT"
                                            class=" " @success="$splade.emit('quantity_updated')">
                                            <div
                                                class=" flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0
                                sm:space-x-4">
                                                <button class="bg-gray-300 text-gray-600 px-2 py-1 rounded sm:px-3 sm:py-2"
                                                    @click="`${form.quantity > 1 ? form.quantity-- : 1}`"
                                                    id="decrementQuantity">-</button>
                                                <span type="text" class="border text-center w-10 sm:w-14" id="quantity"
                                                    v-text="`${form.quantity}`"> </span>
                                                <button
                                                    class="bg-buttonColor0 hover:bg-buttonColor1 text-white px-2 py-1 rounded sm:px-3 sm:py-2"
                                                    @click="`${form.quantity++}`" id="incrementQuantity">+</button>
                                                <input type="text" id="cart_productId" hidden
                                                    value="{{ $cartItem->product->id }}">
                                            </div>
                                        </x-splade-form>
                                    </div>
                                    <span style="margin-right:3%"
                                        class="text-center  w-1/5 font-semibold text-xs md:text-sm" id="productPrice">₹
                                        {{ $cartItem->product->price }}</span>
                                    <x-splade-rehydrate on="quantity_updated">
                                        <span style="margin-right:1%"
                                            class="text-center  w-1/5 font-semibold text-xs md:text-sm" id="productPrice">₹
                                            {{ $cartItem->product->price * $cartItem->quantity }}</span>
                                    </x-splade-rehydrate>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
                @php
                    $totalPrice1 = 0;
                @endphp

                <x-splade-rehydrate on="quantity_updated">
                    @foreach (auth()->user()->cartItem as $item)
                        @php
                            $totalPrice1 += $item->product->price * $item->quantity;
                        @endphp
                    @endforeach
                </x-splade-rehydrate>

                <div class="mt-6 md:mt-10 mb-5">
                    <x-splade-rehydrate on="quantity_updated">
                        <div class="flex justify-between border-b pb-4">
                            <h3 class="font-semibold text-gray-600 text-xs md:text-sm uppercase w-2/5">Total Amount</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"></h3>

                            <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5"
                                id="totalProductPrice1">
                                ₹ {{ $totalPrice1 }}</h3>

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
                                ₹ {{ $totalPrice1 }}</h3>



                        </div>
                    </x-splade-rehydrate>
                    <span>
                        <p class="error-msg text-green-500 text-center my-4" id="error-message">

                        </p>
                    </span>
                    <span id="errorMessage" style="display: none; color: red;">
                    </span>
                    <label for="promo" class="font-semibold block mb-2 text-xs md:text-sm uppercase">Coupon Code</label>
                    <div class="flex justify-between">
                        <div class="w-3/4">
                            <input type="text" placeholder="Add Coupon" id="couponCode" name="coupon_code"
                                class="w-full p-2 mr-4 border border-gray-300 rounded-md focus:outline-none">
                            <input type="text" placeholder="minimum_ammount" id="minimum_ammount" name="minimum_ammount"
                                class="w-full hidden p-2 mr-4 border border-gray-300 rounded-md focus:outline-none">
                        </div>

                        <div class="w-1/4">
                            <button id="applyCouponButton"
                                class="w-full bg-buttonColor0 text-white font-semibold py-2 rounded-md hover:bg-buttonColor1 focus:outline-none">APPLY</button>
                        </div>
                        <script>
                            function handleCoupon() {
                                document.getElementById('errorMessage').style.display = 'block';
                                event.preventDefault();
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div id="summary" class="w-full md:w-1/4 px-4 md:px-8 py-6 md:py-10">
                <h1 class="font-semibold text-xl md:text-2xl border-b pb-4 md:pb-8">Order Summary</h1>
                <x-splade-rehydrate on="quantity_updated">
                    <div class="flex justify-between mt-4 md:mt-10 mb-5">
                        <span class="font-semibold text-sm md:text-base uppercase">Total Amount</span>
                        <span class="font-semibold text-sm md:text-base">₹ {{ $totalPrice }}</span>
                    </div>
                </x-splade-rehydrate>
                <div class="flex justify-between mt-4 md:mt-10 mb-5">
                    <span class="font-semibold text-sm md:text-base uppercase">Coupon Discount Amount</span>
                    <span class="font-semibold text-sm md:text-base" id="discountAmount1">₹ 0</span>
                </div>
                <x-splade-rehydrate on="quantity_updated">
                    <div class="flex justify-between mt-4 md:mt-10 mb-5">
                        <span class="font-semibold text-sm md:text-base uppercase">Sub Total</span>
                        <span class="font-semibold text-sm md:text-base " id="subTotal1">₹ {{ $totalPrice }}</span>
                    </div>
                </x-splade-rehydrate>
                <div class="mt-6 md:mt-10">
                    @if ($cartItems->count() < 1)
                        <Link href="#">
                        <button
                            class="w-full bg-buttonColor0 hover:bg-buttonColor1 text-white font-semibold py-2 rounded-md text-xs md:text-sm focus:outline-none mt-4">CHECKOUT</button>
                        </Link>
                    @else
                        <Link href="{{ 'checkout' }}">
                        <button id="putSessionCoupon"
                            class="w-full bg-buttonColor0 hover:bg-buttonColor1 text-white font-semibold py-2 rounded-md text-xs md:text-sm focus:outline-none mt-4">CHECKOUT</button>
                        </Link>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $('#applyCouponButton').click(function(event) {
            event.preventDefault();
            var couponCode = $('#couponCode').val();
            var totalPrice = '{{ $totalPrice1 }}';
            $.ajax({
                url: '/applyCoupon', // Route for applying the coupon
                method: 'POST',
                data: {
                    coupon_code: couponCode,
                    total_price: totalPrice,

                },
                success: function(response) {
                    if (response.discountAmount) {
                        console.log('working response ', response.discountAmount);
                        $('#discountAmount').text('$' + response.discountAmount);
                        $('#discountAmount1').text('$' + response.discountAmount);
                        $('#subTotal').text('$' + (response.subTotal));
                        $('#subTotal1').text('$' + (response.subTotal));
                        $('#error-message').text('Coupon Applied Sucessfully');
                        $('#minimum_ammount').val(response.minimumAmount);

                    } else {
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
