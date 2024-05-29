@extends('layouts.layout')
@section('content')

@php
session()->put('checkoutDetails.checkoutPrice.discount', null);
@endphp

<x-hero-section :title="'Our Products'" :description="'Whether it’s a busy five-star restaurant, a commercial kitchen, a supermarket chill cabinet or a cupboard at
home, the food waiting to be prepared all benefit from spices and ingredients that lift a dish – and really
bring it to life.'">
</x-hero-section>

<div class="product mt-10">
    <div class="container mx-auto">
        <div class="px-4 grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $product )
            <Link modal href="{{route('productDetails',$product)}}"
                class="relative group p-4 border border-gray-200 hover:border-kiwi transition duration-300 hover:shadow-lg rounded-lg text-center">
            <img src="{{ asset('storage/'.$product->media->file_path) }}" alt="Product Image"
                class="w-full h-48 object-cover rounded-lg transition duration-700 ease-in-out hover:scale-105">
            <h3 class="text-xl font-semibold text-center mt-2">{{$product->name}}</h3>
            <p class="text-gray-600 text-center mt-2">₹ {{$product->price}}</p>

            <div class="px-6 pt-4">
                <span
                    class="bg-buttonColor0 text-white hover:bg-buttonColor1  font-bold py-2 px-4 rounded-fullbg-buttonColor0 text-white hover:bg-buttonColor1 font-bold py-2 px-4 rounded">
                    View
                    Now</span>
            </div>
            </Link>
            @endforeach
        </div>
        <div class="paginate text-center m-6">
            {{$products->render()}}
        </div>
    </div>
</div>
@endsection