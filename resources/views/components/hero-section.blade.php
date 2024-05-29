{{-- <div class="product_img">
    <div class="text-center">
        <h1 style="top: 4px;">{{$title}}</h1>
        <p>{{$description}}</p>
    </div>
</div> --}}

<section class="relative h-96 flex items-center justify-center">
    <div class="absolute inset-0 ">
        <img src="https://images.unsplash.com/photo-1591272216626-b09e38519371?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Background Image" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    <div class="container relative mx-auto px-4 py-16 text-center max-w-3xl ">
        <h1 class="mb-4 text-5xl font-bold text-white font-mono">{{$title}}</h1>
        {{-- <h2 class="mb-8 text-2xl font-medium text-white">Leading Manufacturer of Herbs and Spices in the UK</h2>
        --}}
        <p class="mb-8 text-lg text-white">{{$description}}</p>
        {{-- <a href="#"
            class="rounded-lg bg-white px-4 py-2 text-gray-800 transition duration-300 ease-in-out hover:bg-gray-200">Learn
            More</a> --}}
    </div>
</section>