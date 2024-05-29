<!-- component -->
{{-- @dd($orders->user); --}}
{{-- @dd(auth()->user()) --}}

@extends('layouts.layout')

@section('content')

<div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

  <div class="flex justify-start item-start space-y-2 flex-col">

    <h1 class="text-3xl dark:text-white lg:text-3xl font-semibold leading-7 lg:leading-9 text-gray-800">My Order</h1>
    {{-- <p class="text-base dark:text-gray-300 font-medium leading-6 text-gray-600">{{ $orders->created_at }}</p> --}}
  </div>




  <div
    class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">


    <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">


      <div style="background-color:#f1f1f2;"
        class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
        {{-- <p class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800">My Order
        </p> --}}
        <div
          class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
          <div class="image">
            <h3>Image</h3>
          </div>
          <div class="name">
            <h3>Name</h3>
          </div>
          <div class="unitPrice">
            <h3>Unit Price</h3>
          </div>
          <div class="quantity">
            <h3>Quantity</h3>
          </div>
          <div class="subTotal">
            <h3>Sub Total</h3>
          </div>
        </div>

        @php $subtotal=0; @endphp
        @foreach ($orders as $order )
        @foreach ($order->Order_Item as $item)
        <div
          class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
          <div class="w-32 md:w-40">
            <img class=" h-32 md:h-40" src="{{asset('storage/'.$item->product->media->file_path)}}">
          </div>
          <div
            class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
            <div class="w-full flex flex-col justify-start items-start space-y-8">
              <h3 class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-gray-800">{{
                $item->product->name }}</h3>
              <div class="flex justify-start items-start flex-col space-y-2">
                <p class="text-sm dark:text-red leading-none text-red"><span class="dark:text-red text-red"><span
                      class="font-bold">Description:- </span></span>{{ $item->product->description }}</p>
                {{-- <p class="text-sm dark:text-white leading-none text-gray-800"><span
                    class="dark:text-gray-400 text-gray-300">Qty: </span>{{ $item->quantity }}</p> --}}
                {{-- <p class="text-sm dark:text-white leading-none text-gray-800"><span
                    class="dark:text-gray-400 text-gray-300">Color: </span> Light Blue</p> --}}
              </div>
            </div>
            <div class="flex justify-between space-x-8 items-start w-full">
              <p class="text-base dark:text-white xl:text-lg leading-6"> <span class="font-bold">Unit Price:- </span>${{
                $item->product->price }}
                {{-- <span class="text-red-300 line-through"> $45.00</span> --}}
              </p>
              <p class="text-base dark:text-white xl:text-lg leading-6 text-gray-800">{{ $item->quantity }}</p>
              <p class="text-base dark:text-white xl:text-lg font-semibold leading-6 text-gray-800">${{
                $item->quantity*$item->product->price }}</p>
            </div>
          </div>
        </div>

        @php
        $subtotal= $subtotal+ ($item->quantity*$item->product->price );
        @endphp
        @endforeach
        @endforeach

        @php
        $shipping=8;
        // $discount=$orders->discount;
        $total=$subtotal+$shipping;
        @endphp

      </div>

    </div>

    {{-- <h1 class="text-2xl text-center font-semibold">Woops,No Orders</h1> --}}



    <div
      class="bg-gray-100 dark:bg-gray-800 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">

      <div
        class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
        <div style="background-color:#fcdfdf"
          class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full 	dark:bg-gray-800 space-y-6">
          <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Summary</h3>
          <div class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
            <div class="flex justify-between w-full">
              <p class="text-base dark:text-white leading-4 text-gray-800">Subtotal</p>
              <p style="color: black;font-weight:bold" class="text-base dark:text-gray-300 leading-4 text-gray-600">${{
                $subtotal }}</p>
            </div>
            <div class="flex justify-between items-center w-full">
              <p class="text-base dark:text-white leading-4 text-gray-800">Discount </p>
              {{-- <p style="color: black;font-weight:bold"
                class="text-base dark:text-gray-300 leading-4 text-gray-600">-$28.00 (50%)</p> --}}
            </div>
            <div class="flex justify-between items-center w-full">
              <p class="text-base dark:text-white leading-4 text-gray-800">Shipping</p>
              <p style="color: black;font-weight:bold" class="text-base dark:text-gray-300 leading-4 text-gray-600">${{
                $shipping }}</p>
            </div>
          </div>
          <div class="flex justify-between items-center w-full">
            <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">Total</p>
            <p style="color: black;font-weight:bold"
              class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">${{ $total }}</p>
          </div>
        </div>
      </div>

      {{-- <h3 class="text-xl mt-6 text-center dark:text-white font-semibold leading-5 text-gray-800">Customer</h3> --}}
      <div
        class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
        <div class="flex flex-col justify-start items-start flex-shrink-0">
          {{-- <div
            class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
            --}}
            {{-- <img src="{{asset('storage/'.$orders->user->media->file_path)}}" alt="Customer Image"> --}}

            {{-- <div class="flex justify-start items-start flex-col space-y-2"> --}}
              {{-- <p style="color:#EF7E18" class="font-semibold leading-4 text-left">{{ auth()->user()->first_name }}
                <span>{{ auth()->user()->last_name }} </span>
              </p> --}}
              {{-- <p class="text-sm dark:text-gray-300 leading-5 text-gray-600">10 Previous Orders</p> --}}
              {{-- </div> --}}
            {{-- </div> --}}

          {{-- <div
            class="flex justify-center text-gray-800 dark:text-white md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z"
                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M3 7L12 13L21 7" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p style="color:#EF7E18; font-weight:bold" class="cursor-pointer text-sm leading-5 ">{{
              auth()->user()->email }}</p>
          </div> --}}
        </div>
        {{-- <div style="background-color: #fcf1f1"
          class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full 	dark:bg-gray-800 space-y-6"> --}}

          <div class="flex justify-between mt-4 xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
            <div style="background-color: #fcdfdf"
              class="px-3 py-3 md:p-3 xl:p-3 w-full flex justify-center mt-5 md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
              <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                <p
                  class="text-base text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">
                  Shipping & Billing Address</p>
                @if(auth()->user()->order->count() > 0)
                <p style="color:black;"
                  class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                  {{ auth()->user()->Shipping_address[0]->state}}</p>
                <p style="color:black;"
                  class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                  {{ auth()->user()->Shipping_address[0]->city}},<span>{{
                    auth()->user()->Shipping_address[0]->street}}</span></p>
                @else
                <span></span>

                @endif
              </div>
              {{-- <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4">
                <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">
                  Billing Address</p>
                <p
                  class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                  180 North King Street, Northhampton MA 1060</p>
              </div> --}}
            </div>
            {{-- <div class="flex w-full justify-center items-center md:justify-start md:items-start">
              <button
                class="mt-6 md:mt-0 dark:border-white dark:hover:bg-gray-900 dark:bg-transparent dark:text-white py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium w-96 2xl:w-full text-base font-medium leading-4 text-gray-800">Edit
                Details</button>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection