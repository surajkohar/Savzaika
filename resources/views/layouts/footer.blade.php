<div class="w-100 pt-2 border-2 border-black"
    style="background-image:url('//waffy-demo.myshopify.com/cdn/shop/files/footer_1.jpg?v=1621853780');background-size:cover;background-repeat:no-repeat;">
    {{-- <div style="background-color: #4c83f2" class="grid lg:grid-cols-3 md:col-span-3 sm:grid-cols-2 grid-cols-1">
        --}}
        <div class="grid lg:grid-cols-3 md:col-span-3 sm:grid-cols-2 grid-cols-1 bg-gray-600 bg-opacity-25">
            <div class="w-full flex-col p-8 text-center">
                <a href="/">
                    <img style="height: 5rem; width: 9.5rem;" class="h-24 w-48 rounded-lg"
                        src="{{ asset('img/logo.png') }}" alt="Company Logo">
                </a>
                <p class="mt-2 text-sm font-semibold text-white text-justify">
                    Spices have always been woven into the history and culture of India, with many historical tales
                    referencing them and no meal complete without them. Savzaika was founded to create an avenue for the
                    world to continue enjoying these incredible spices.
                </p>
            </div>

            <div class="w-full flex-col p-8 text-center ">
                <span style="color: #FF9933;" class="font-semibold text-xl">Quick Links </span>
                <div class="text-white font-semibold text-sm flex flex-col gap-4 mt-4">
                    <a href="{{ route('home') }}" class="hover:text-[#FF9933]"><span>Home</span></a>
                    <a href="{{ route('ourcompany') }}" class="hover:text-[#FF9933]"><span>About Us</span></a>
                    <a href="{{ route('product') }}" class="hover:text-[#FF9933]"><span>Products</span></a>
                    <a href="{{ route('work_for_us') }}" class="hover:text-[#FF9933]"><span>Work for us</span></a>
                    <a href="{{ route('contact') }}" class="hover:text-[#FF9933]"><span>Contact</span></a>
                </div>
            </div>

            <div class="w-full flex-col p-8 text-center">
                <span style="color: #FF9933;" class="font-semibold text-xl">Contact Information</span>
                <div class="text-white font-semibold text-sm flex flex-col gap-4 mt-4">
                    <span class="hover:text-gray-80">
                        <i class="fa fa-location text-white mr-2"></i>
                        <span>Plot No. 290, Phase-9, Industrial Area, California, US</span>
                    </span>
                    <span class="hover:text-[#FF9933]">
                        <i class="hover:text-[#FF9933] fa fa-phone mr-2"></i>
                        <span><a href="tel:8547878801">88376-80595</a> 
                            {{-- & <a   href="tel:94173-93931">94173-93931</a> --}}
                        </span>
                    </span>
                    <a href="mailto:Savzaika@gmail.com" class="hover:text-[#FF9933]">
                        <i class="fa fa-envelope text-white mr-2"></i>
                        <span>info@savzaika.com</span>
                    </a>
                </div>

                @php
                $isHomePage = request()->is('/');
                if ($isHomePage) {
                $formattedCount = str_pad($visitorCounter, 3, '0', STR_PAD_LEFT);
                $digits = str_split($formattedCount);
                }
                @endphp

                <div class="text-center mt-6">
                    @if ($isHomePage)
                    <h2 class="text-xl font-semibold " style="color: #FF9933;">Total Visits</h2>
                    @endif
                    <div class="flex items-center justify-center mt-4">
                        @if ($isHomePage)
                        @foreach ($digits as $digit)
                        <div
                            class="bg-white text-buttonColor1 font-bold rounded-lg h-10 w-10 flex items-center justify-center text-2xl mr-2">
                            {{ $digit }}
                        </div>
                        @endforeach
                        @else
                        {{-- <span></span> --}}
                        @endif
                    </div>
                </div>


            </div>
            {{--
            <hr class="w-full"> --}}

        </div>
        <div class=" p-3 border-t-2 border-gray-200 text-center">

            <span style="color: white;" class="font-semibold text-md mb-1">
                Copyright © All rights reserved | Design by
                <a href="https://himsoftsolution.com/" target="_blank"
                    class="text-yellow-500 font-bold text-[#FF9933]">Him Soft Solution</a>
            </span>
        </div>
        {{-- <div class="w-full bg-yello-600">
            <div class="w-full bg-blue-900 flex justify-center p-3">
                <span style="color: white;" class="font-semibold text-md mb-1">
                    @ copyright.All Rights Reserved | Designed by
                    <a href="https://himsoftsolution.com/" target="_blank"
                        class="text-yellow-500 font-bold text-[#FF9933]">Him soft
                        solution</a>
                </span>
            </div>
        </div> --}}
    </div>




    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}


    {{-- <script type="">
        // vars
'use strict'
var testim = document.getElementById("testim"),
  testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
  testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
  testimLeftArrow = document.getElementById("left-arrow"),
  testimRightArrow = document.getElementById("right-arrow"),
  testimSpeed = 4500,
  currentSlide = 0,
  currentActive = 0,
  testimTimer,
  touchStartPos,
  touchEndPos,
  touchPosDiff,
  ignoreTouch = 30;
;

window.onload = function() {

  // Testim Script
  function playSlide(slide) {
      for (var k = 0; k < testimDots.length; k++) {
          testimContent[k].classList.remove("active");
          testimContent[k].classList.remove("inactive");
          testimDots[k].classList.remove("active");
      }

      if (slide < 0) {
          slide = currentSlide = testimContent.length-1;
      }

      if (slide > testimContent.length - 1) {
          slide = currentSlide = 0;
      }

      if (currentActive != currentSlide) {
          testimContent[currentActive].classList.add("inactive");
      }
      testimContent[slide].classList.add("active");
      testimDots[slide].classList.add("active");

      currentActive = currentSlide;

      clearTimeout(testimTimer);
      testimTimer = setTimeout(function() {
          playSlide(currentSlide += 1);
      }, testimSpeed)
  }

  testimLeftArrow.addEventListener("click", function() {
      playSlide(currentSlide -= 1);
  })

  testimRightArrow.addEventListener("click", function() {
      playSlide(currentSlide += 1);
  })

  for (var l = 0; l < testimDots.length; l++) {
      testimDots[l].addEventListener("click", function() {
          playSlide(currentSlide = testimDots.indexOf(this));
      })
  }

  playSlide(currentSlide);

  // keyboard shortcuts
  document.addEventListener("keyup", function(e) {
      switch (e.keyCode) {
          case 37:
              testimLeftArrow.click();
              break;

          case 39:
              testimRightArrow.click();
              break;

          case 39:
              testimRightArrow.click();
              break;

          default:
              break;
      }
  })

  testim.addEventListener("touchstart", function(e) {
      touchStartPos = e.changedTouches[0].clientX;
  })

  testim.addEventListener("touchend", function(e) {
      touchEndPos = e.changedTouches[0].clientX;

      touchPosDiff = touchStartPos - touchEndPos;

      console.log(touchPosDiff);
      console.log(touchStartPos);
      console.log(touchEndPos);


      if (touchPosDiff > 0 + ignoreTouch) {
          testimLeftArrow.click();
      } else if (touchPosDiff < 0 - ignoreTouch) {
          testimRightArrow.click();
      } else {
        return;
      }

  })
}
</script> --}}

    {{-- <div class="w-full pt-2">
        <div style="background-color: #EF7E18" class="grid lg:grid-cols-3 md:col-span-3 sm:grid-cols-2 grid-cols-1">
            <div class="w-full flex-col p-8 text-center">
                <a href="/"> <img style="height:5rem;width:9.5rem;" class="h-24 w-48 rounded-lg"
                        src="{{ asset('storage/img/footers.png') }}" alt=""></a>
                <p class="mt-2 text-sm font-semibold text-white text-justify">
                    Spices have always been woven into the history and culture of India, with many historical tales
                    referencing them and no meal complete without them. Savzaika was founded to create an avenue for the
                    world to continue enjoying these incredible spices.
                </p>

            </div>
            <div class="w-full flex-col p-8 text-center">
                <span style="color: #853F8F;" class=" font-semibold text-xl">Quick Links </span>
                <div class="text-white font-semibold text-sm flex flex-col gap-4 mt-4">
                    <a href="{{ route('home') }}" class="hover:text-[#FF9933]"><span>Home</span></a>
                    <a href="{{ route('ourcompany') }}" class="hover:text-[#FF9933]"><span>About Us</span></a>
                    <a href="{{ route('product') }}" class="hover:text-[#FF9933]"><span>Products</span></a>
                    <a href="{{ route('work_for_us') }}" class="hover:text-[#FF9933]"><span>Work for us</span></a>
                    <a href="{{ route('contact') }}" class="hover:text-[#FF9933]"><span>Contact</span></a>
                </div>
            </div>

            <div class="w-full flex-col p-8 text-center">
                <span style="color: #853F8F;" class="font-semibold text-xl">Address</span>
                <div class="text-white font-semibold text-sm flex flex-col gap-4 mt-4">
                    <span class="hover:text-gray-80"><i class="fa fa-location text-white mr-2"></i><span>Plot No. 290,
                            Phase-9, Industrial Area, California,US</span></span>
                    <span class="hover:text-[#FF9933]"><i class="hover:text-[#FF9933] fa fa-phone  mr-2"></i><span><a
                                href="tel:8547878801">85578-78801</a> & <a
                                href="tel:94173-93931">94173-93931</a></span></span>
                    <a href="mailto:Savzaika@gmail.com" class="hover:text-[#FF9933]"><i
                            class="fa fa-envelope text-white mr-2"></i><span>Ganeshsons@gmail.com</span></a>
                </div>
                @php

                $isHomePage = request()->is('/');
                if ($isHomePage) {
                $formattedCount = str_pad($visitorCounter, 3, '0', STR_PAD_LEFT);
                $digits = str_split($formattedCount);
                }
                @endphp

                <div class="text-center mt-6">

                    @if ($isHomePage)
                    <h2 class="text-2xl font-semibold">Total Visits</h2>
                    @endif
                    <div class="flex items-center justify-center mt-4">

                        @if ($isHomePage)
                        @foreach ($digits as $digit)
                        <div
                            class="bg-black text-white font-bold rounded-lg h-16 w-16 flex items-center justify-center text-4xl mr-2">
                            {{ $digit }}</div>
                        @endforeach
                        @else
                        <span></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full">
            <div class="w-full bg-black flex justify-center p-3">
                <span style="color: #D70B52;" class="font-semibold text-md">@ copyright.All Rights Reserved | Designed
                    by <a href="https://himsoftsolution.com" target="_blank" class="text-green-500 font-bold">Him Soft
                        Solution</a> </span>
            </div>
        </div> --}}