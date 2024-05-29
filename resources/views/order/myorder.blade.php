@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-10">
        @if ($orders->count() < 1)
            <div class="h-96 flex justify-center items-center flex-col space-y-6">
                <h1>Woops, No Order, Buy Some Product</h1>
                <Link href="{{ route('product') }}"> <button
                    class="bg-buttonColor0 hover:bg-buttonColor1 text-white p-2 rounded">Continue
                    Shopping</button>
                </Link>
            </div>
        @else
            @foreach ($orders as $order)
                <div class="flex flex-col md:flex-row shadow-md my-10">
                    <div class="md:w-3/4 bg-white px-4 md:px-10 py-6 md:py-10">
                        <div class="flex justify-between border-b pb-4 md:pb-8">
                            <h1 class="font-semibold text-xl md:text-2xl">Order ID: #{{ $order->id }}</h1>
                            <h2 class="font-semibold text-xl md:text-2xl"> Total Items({{ $order->Order_Item->count() }})
                            </h2>
                        </div>
                        <div class="date">
                            <h3 class="font-semibold text-black text-xs md:text-sm uppercase w-2/5 mt-4">Buy Date : <span
                                    class="text-black">
                                    {{ $order->created_at }}
                                </span>
                            </h3>
                        </div>
                        <div class="mt-4 md:mt-10 mb-5">
                            <div class="flex justify-between border-b pb-4">
                                <h3 class="font-semibold text-gray-600 text-xs md:text-sm uppercase w-2/5">Product</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">
                                    Quantity</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Price
                                </h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs md:text-sm uppercase w-1/5">Total
                                    Price
                                </h3>
                            </div>

                            <div class="flex flex-col py-2 md:py-4">
                                @php $subtotal=0; @endphp
                                @foreach ($order->Order_Item as $item)
                                    <div
                                        class=" flex items-center
                            hover:bg-gray-100 -mx-2 md:mx-0 px-4 md:px-6 py-3 md:py-5 ">
                                        <div class=" flex w-2/5 ">
                                            <Link modal href="{{ route('productDetails', $item) }}">
                                            <div class=" w-16 md:w-20">
                                                <img class="h-20 md:h-24"
                                                    src="{{ asset('storage/' . $item->product->media->file_path) }}"
                                                    alt="">
                                            </div>
                                            </Link>
                                            <div class="flex flex-col justify-between ml-3 md:ml-4 flex-grow s">
                                                <span
                                                    class="font-semibold text-sm md:text-base">{{ $item->product->name }}</span>
                                                <span
                                                    class="text-gray-500 text-xs md:text-sm category">{{ Str::limit($item->product->description, '50') }}</span>
                                            </div>
                                        </div>
                                        <span class="text-center w-1/5 font-semibold text-xs md:text-sm"
                                            id="productPrice">{{ $item->quantity }}</span>
                                        <span class="text-center w-1/5 font-semibold text-xs md:text-sm" id="productPrice">₹
                                            {{ $item->product->price }}</span>
                                        <span class="text-center w-1/5 font-semibold text-xs md:text-sm "
                                            id="totalProductPrice">₹ {{ $item->product->price * $item->quantity }}</span>
                                    </div>

                                    @php
                                        $subtotal = $subtotal + $item->quantity * $item->product->price;
                                    @endphp

                                    @php
                                        $shipping = 8;
                                        $couponDiscountAmmount = 0;
                                        $subTotal = $subtotal + $shipping - $order->discount_amount;
                                    @endphp
                                @endforeach
                            </div>

                        </div>

                        <div class="mt-6 md:mt-10 mb-5">
                            <div class=" justify-between border-b pb-4">
                                <h3 class="font-semibold text-xl md:text-2xl border-b pb-4 md:pb-8">Shipping Address</h3>
                                <div class="flex justify-between mt-2 md:mt-5 mb-2">
                                    <span class="font-semibold text-sm md:text-base uppercase">City</span>
                                    <span
                                   
                                        class="font-semibold text-sm md:text-base">{{ $order->Shipping_address->city }}</span>
                                </div>
                                <div class="flex justify-between mt-2 md:mt-5 mb-2">
                                    <span class="font-semibold text-sm md:text-base uppercase">State</span>
                                    <span class="font-semibold text-sm md:text-base">{{ $order->Shipping_address->state }}
                                    </span>
                                </div>

                                <div class="flex justify-between mt-2 md:mt-5 mb-2 ">
                                    <span class="font-semibold text-sm md:text-base   uppercase">Phone</span>
                                    <span
                                        class="font-semibold text-sm md:text-base ">{{ $order->Shipping_address->phone }}</span>
                                </div>

                                <div class="flex justify-between mt-2 md:mt-5 mb-2 ">
                                    <span class="font-semibold text-sm md:text-base   uppercase">Street</span>
                                    <span
                                        class="font-semibold text-sm md:text-base">{{ $order->Shipping_address->street }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="summary" class="w-full md:w-1/4 px-4 md:px-8 py-6 md:py-10">
                        <h1 class="font-semibold text-xl md:text-2xl border-b pb-4 md:pb-8">Order Summary</h1>
                        <x-splade-rehydrate on="quantity_updated">
                            <div class="flex justify-between mt-4 md:mt-10 mb-5">
                                <span class="font-semibold text-sm md:text-base uppercase">Total Amount</span>
                                <span class="font-semibold text-sm md:text-base">₹ {{ $subtotal }}</span>
                            </div>
                        </x-splade-rehydrate>
                        <div class="flex justify-between mt-4 md:mt-10 mb-5">
                            <span class="font-semibold text-sm md:text-base uppercase">Coupon Discount Amount</span>
                            <span class="font-semibold text-sm md:text-base" id="discountAmount1">₹
                                {{ $order->discount_amount }}</span>
                        </div>
                        <div class="flex justify-between mt-4 md:mt-10 mb-5 ">
                            <span class="font-semibold text-sm md:text-base uppercase">Shipping Charge</span>
                            <span class="font-semibold text-sm md:text-base" id="discountAmount1">₹
                                {{ $shipping }}</span>
                        </div>

                        <div class="flex justify-between mt-4 md:mt-10 border-b pb-4 md:pb-8">
                            <span class="font-semibold text-sm md:text-base   uppercase">Sub Total</span>
                            <span class="font-semibold text-sm md:text-base" id="subTotal1">₹ {{ $subTotal }}</span>
                        </div>

                        <div class="m-6 md:mt-10 space-x-6 ">
                            <span class="font-semibold text-sm md:text-base uppercase ">Status:</span>
                            <span
                                class="font-semibold text-sm md:text-base text-white uppercase bg-green-500 p-2 rounded">{{ $order->status }}</span>

                        </div>
                        <div class="mt-6 md:mt-10 flex justify-center items-center space-x-6">
                            <button
                                class="bg-transparent border-2 border-black p-3 rounded text-black hover:text-white hover:bg-black">Share</button>
                            <a href="{{ route('viewInvoice', $order) }}">
                                <button
                                    class="bg-transparent border-2 border-black p-3 rounded text-black hover:text-white hover:bg-black">View</button>
                            </a>
                            <a href="{{ route('generateInvoice', $order) }}">
                                <button
                                    class="bg-transparent border-2 border-black p-3 rounded text-black hover:text-white hover:bg-black">Print</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>


@endsection
