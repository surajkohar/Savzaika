<section class="relative h-full flex items-center justify-center">
    <div class="absolute inset-0 ">
        <img src="{{ asset($image) }}" alt="Background Image" class="h-full w-full object-cover" />
        {{-- <img src="{{ asset('storage/'.$image) }}" alt="Background Image" class="h-full w-full object-cover" /> --}}
        <div class="absolute inset-0 bg-black opacity-10"></div>
    </div>
    <div class="container relative mx-auto px-4 py-16 text-center max-w-3xl ">
        <h1 class="mb-4 text-5xl font-bold text-white">{{$title}}</h1>
        {{-- <h2 class="mb-8 text-2xl font-medium text-white">Leading Manufacturer of Herbs and Spices in the UK</h2>
        --}}
        <p class="mb-8 text-lg text-white">{{$description1}}</p>
        <p class="mb-8 text-lg text-white">{{$description2}}</p>
        <a href="/product"
            class="rounded-lg bg-buttonColor0 hover:bg-buttonColor1 px-4 py-2 text-white p-6 transition duration-300 ease-in-out ">{{$button}}</a>
    </div>
</section>