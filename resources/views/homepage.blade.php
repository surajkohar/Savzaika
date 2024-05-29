@extends('layouts.layout')
@section('content')

@php
session()->forget('discountAmount');
session()->put('checkoutDetails.checkoutPrice.discount', null);
@endphp

<div
  class="swiffy-slider slider-nav-autoplay slider-nav-visible slider-nav-animation slider-indicators-round slider-nav-animation-slow"
  id="infiniteSliding">
  <style>
    #infiniteSliding .slider-indicators button:last-child {
      display: none
    }
  </style>
  <ul class=" slider-container" id="container1">
    <li id="slide1" class="">
      <x-slider-component :title="'We bring spice to life'"
        :description1="'Whether it’s a busy five-star restaurant, a commercial kitchen, a supermarket chill cabinet or a cupboard at home, the food waiting to be prepared all benefit from spices and ingredients that lift a dish – and really bring it to life.'"
        :description2="'We’re the company behind almost all of those dishes. We’ve been around a long time, and our expertise is still shaping tastes today.'"
        :image="'img/sliders.png'" :button="'Explore'">
      </x-slider-component>
    </li>
    <li id="slide2">
      <x-slider-component :title="'We bring spice to life'"
        :description1="'Whether it’s a busy five-star restaurant, a commercial kitchen, a supermarket chill cabinet or a cupboard at home, the food waiting to be prepared all benefit from spices and ingredients that lift a dish – and really bring it to life.'"
        :description2="'We’re the company behind almost all of those dishes. We’ve been around a long time, and our expertise is still shaping tastes today.'"
        :image="'img/spices.png'" :button="'Explore'">
      </x-slider-component>
    </li>
    <li id="slide3">
      <x-slider-component :title="'We bring spice to life'"
        :description1="'Whether it’s a busy five-star restaurant, a commercial kitchen, a supermarket chill cabinet or a cupboard at home, the food waiting to be prepared all benefit from spices and ingredients that lift a dish – and really bring it to life.'"
        :description2="'We’re the company behind almost all of those dishes. We’ve been around a long time, and our expertise is still shaping tastes today.'"
        :image="'img/pr_img.png'" :button="'Explore'">
      </x-slider-component>
    </li>
  </ul>

  <button type="button" class="slider-nav" aria-label="Go to previous"></button>
  <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>

  <div class="slider-indicators">
    <button aria-label="Go to slide"></button>
    <button aria-label="Go to slide"></button>

  </div>
  <script>
    window.addEventListener('load', () => {
        let sliderElement = document.getElementById('infiniteSliding');
        const container = sliderElement.querySelector(".slider-container");

        const infiniteScrollToFirstWhenOnLast = () => {
            if (container.lastElementChild == container.querySelector('.slide-visible')) {
                container.scroll({
                    left: 0,
                    behavior: "instant"
                });
            }
        };
        //Append the first slide as the last
        container.appendChild(container.firstElementChild.cloneNode(true));
        //Add an additional indicator button to keep counts correct
        sliderElement.querySelector(".slider-indicators").appendChild(sliderElement.querySelector(".slider-indicators").lastElementChild.cloneNode(true));
        swiffyslider.onSlideEnd(sliderElement, infiniteScrollToFirstWhenOnLast, 90);
    });
  </script>

</div>

<div class="mx-auto">
  <section
    class="container w-[90%] mx-auto shadow-lg mt-10 mb-10 border-2 border-gray-200 p-6 space-y-6 lg:flex lg:flex-row-reverse items-center">
    <div class="images flex justify-end w-full lg:w-1/2 mx-auto">
      <img src="{{ asset('img/cta/bg.jpeg') }}" alt="" class="w-[70%] mx-auto">
    </div>
    <div class="w-full lg:w-1/2 mx-auto space-y-6 md:text-left text-center">
      <h3 class="text-3xl text-buttonColor1 font-bold">Indian Saffron & Spices</h3>
      <p>We are the leading manufacturer of herbs and spices in the UK and specialists in processing, packing, and
        marketing.</p>


      <Button class="bg-buttonColor0 hover:bg-buttonColor1 text-white px-4 py-2 rounded">
        <Link href="{{route('ourcompany')}}">Our Company > </Link>
      </Button>

    </div>
  </section>
</div>

<div class="container w-[90%] mx-auto my-6">
  <div class="px-8 py-6">
    <span class="lg:text-3xl md:text-2xl text-xl font-bold text-buttonColor1 my-6 "> Top Product</span>
    <span class="text-xl font-normal mt-2 text-gray-700"></span>
  </div>
  <div class="swiffy-slider slider-item-show6 slider-nav-dark">

    <ul class="slider-container">
      @foreach($products as $product)
      <li>
        <div>
          <Link preserve-scroll modal href="{{route('productDetails',$product)}}">
          <div class="flex flex-col">
            <div
              class=" lg:h-40 md:h-40 lg:w-40 md:w-40 sm:h-32 sm:w-32 h-32 w-32 rounded-full flex justify-center mx-auto bg-yellow-100 hover:bg-yellow-200 transition ease-in-out delay-150">
              <div class="h-[80%] w-[80%] rounded-full border-[1px]  flex justify-center my-auto">
                <img src="{{ asset('storage/'.$product->media->file_path) }}" alt="{{ $product->name }}"
                  class="w-full h-full object-cover rounded-full">
              </div>
            </div>
            <div class="mt-2 w-full flex justify-center">
              <span class="font-semibold text-xl mx-auto">{{ $product->name }}</span>
            </div>
          </div>
          </Link>
        </div>
      </li>

      @endforeach
    </ul>

    <button type="button" class="slider-nav text-black"></button>
    <button type="button" class="slider-nav slider-nav-next text-black"></button>

    <div class="slider-indicators">
      <button class="active"></button>
      <button></button>
      <button></button>
    </div>
  </div>
</div>

<div class=" our-product-wrapper  mx-auto shadow-[0_8px_30px_rgb(0,0,0,0.12)] my-12 ">
  <div class="p-4 container w-[90%] mx-auto ">
    <span class=" lg:text-3xl md:text-2xl text-xl font-bold text-buttonColor1  "> Our Products </span>
    <span class="text-xl font-normal mt-2 text-gray-700"></span>
  </div>
  <div class="container-product-slider container w-[90%] mx-auto p-4 ">
    <div class="swiffy-slider slider-item-show3 slider-item-reveal slider-nav-dark   ">
      <ul class="slider-container" id="slider2">
        @foreach($products as $product)
        <li>
          <Link preserve-scroll modal href="{{route('productDetails',$product)}}"
            class="relative group pb-4 text-center">
          <div
            class=" border-2 border-gray card-wrapper p-4 shadow-[rgba(50,_50,_105,_0.15)_0px_2px_5px_0px,_rgba(0,_0,_0,_0.05)_0px_1px_1px_0px] w-[80%] ">
            <img src="{{ asset('storage/'.$product->media->file_path) }}" alt="Product Image"
              class="w-full h-48 object-cover rounded-lg">
            <h3 class="text-xl font-semibold text-center mt-2">{{$product->name}}</h3>
            <p class="text-gray-600 text-center mt-2"> ₹ {{$product->price}}</p>
            <div class="px-6 pt-4">
              <span class="bg-buttonColor0 text-white hover:bg-buttonColor1 font-bold py-2 px-4 rounded">
                View
                Now</span>
            </div>
          </div>
          </Link>
        </li>
        @endforeach
      </ul>
      <button type="button" class="slider-nav" aria-label="Go to previous"></button>
      <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
    </div>
  </div>
</div>

<div style="background: #f5f5f5;">
  <div class="container w-[90%] mx-auto">
    <div class="row">
      <div class="text-center Innovation">
        <h3>Upcoming Products</h3>
        <p>Interpreting tastes and challenging conventions is an integral part of our new product development work.
        </p>
      </div>
    </div>
    <div id="testim" class="testim">
      <div class="testim-cover">
        <div class="wrap">
          <div
            class="swiffy-slider  slider-nav-caret slider-nav-dark slider-nav-autoplay slider-indicators-round slider-indicators-sm slider-nav-animation">
            <ul class="slider-container ">
              <li class="">
                <div class="img"><img src="{{ asset('img/m.png') }}" alt="" class="w-1/2 mx-auto"></div>
              </li>
              <li>
                <div class="img"><img src="{{ asset('img/cardmom.jpg') }}" alt="" class="w-1/2  mx-auto"></div>
              </li>
              <li>
                <div class="img"><img src="{{ asset('img/black_peepar.jpg') }}" alt="" class="w-1/2 mx-auto">
                </div>
              </li>
              <li>
                <div class="img"><img src="{{ asset('img/spices.jpg') }}" alt="" class="w-1/2 mx-auto"></div>
              </li>
              <li>
                <div class="img"><img src="{{ asset('img/spices_india.jpg') }}" alt="" class="w-1/2 mx-auto">
                </div>
              </li>
            </ul>
            <button type="button" class="slider-nav"></button>
            <button type="button" class="slider-nav slider-nav-next"></button>
            <ul class="slider-indicators">
              <li class="active"></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="spirit">
  <div class="container mx-auto w-[90%]">
    <div class="row">
      <div class="text-center Innovation sm:px-6">
        <h3>Innovation</h3>
        <p>Interpreting tastes and challenging conventions is an integral part of our new product development work.
        </p>
      </div>
    </div>
    <div class="flex flex-wrap mt-5 ">
      <div class="w-[90%] mx-auto lg:flex lg:items-center lg:justify-between space-x-2">
        <div class="w-46 lg:w-1/6 lg:border-none">
          <div class=" text-center p-4 border border-gray-200 rounded-md">
            <img src="{{ asset('img/s.png') }}" alt="Stronger Together" class=" mx-auto mb-4">
            <h6 class="text-lg font-semibold mb-2">Stronger together</h6>
            <p class="text-gray-700">We achieve more when we think and act as one.</p>
          </div>
        </div>

        <div class="w-full lg:w-1/6 lg:border-none">
          <div class=" text-center p-4 border border-gray-200 rounded-md">
            <img src="{{ asset('img/p.png') }}" alt="Performance" class="mx-auto mb-4">
            <h6 class="text-lg font-semibold mb-2">Performance</h6>
            <p class="text-gray-700">We are all accountable for delivering our best results.</p>
          </div>
        </div>

        <div class="w-full lg:w-1/6 lg:border-none">
          <div class=" text-center p-4 border border-gray-200 rounded-md">
            <img src="{{ asset('img/i.png') }}" alt="Integrity" class="mx-auto mb-4">
            <h6 class="text-lg font-semibold mb-2">Integrity</h6>
            <p class="text-gray-700">We show honesty and humility in our relationships.</p>
          </div>
        </div>

        <div class="w-full lg:w-1/6 lg:border-none">
          <div class=" text-center p-4 border border-gray-200 rounded-md">
            <img src="{{ asset('img/r.png') }}" alt="Responsibility" class="mx-auto mb-4">
            <h6 class="text-lg font-semibold mb-2">Responsibility</h6>
            <p class="text-gray-700">We do the right thing by our people, brands, business partners, and community.</p>
          </div>
        </div>

        <div class="w-full lg:w-1/6 lg:border-none">
          <div class=" text-center p-4 border border-gray-200 rounded-md">
            <img src="{{ asset('img/i_1.png') }}" alt="Initiative" class="mx-auto mb-4">
            <h6 class="text-lg font-semibold mb-2">Initiative</h6>
            <p class="text-gray-700">We welcome creative ways to add value and make things happen.</p>
          </div>
        </div>

        <div class="w-full lg:w-1/6 lg:border-none">
          <div class=" text-center p-4 border border-gray-200 rounded-md">
            <img src="{{ asset('img/t.png') }}" alt="Teamwork" class="mx-auto mb-4">
            <h6 class="text-lg font-semibold mb-2">Teamwork</h6>
            <p class="text-gray-700">We collaborate enthusiastically, respect each other, and celebrate success.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="openWhatsAppPopup" style="position: fixed;width:60px;height:60px;right:10px;bottom:10px;">
    <a href=""> <img src="whatsapp.png" alt="whatsapp logo" style="width: 60px; height:60px"></a>
  </div>
</div>

@endsection
<script>
  $(document).ready(function () {
          $('#openWhatsAppPopup').on('click', function (e) {
              e.preventDefault();
              var phoneNumber = '9872992086'; // Replace with your WhatsApp phone number 85578-78801
              var encodedPhoneNumber = encodeURIComponent(phoneNumber);
              var whatsappURL = 'https://api.whatsapp.com/send?phone=' + encodedPhoneNumber;
              var popupWindow = window.open(whatsappURL, 'WhatsAppPopup', 'width=600,height=400');
          });
      });
</script>