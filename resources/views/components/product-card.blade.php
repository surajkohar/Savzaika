<div
    class="relative group p-4 border border-gray-200 hover:border-kiwi transition duration-300 hover:shadow-lg rounded-lg text-center">
    <img src="{{ asset('storage/'.$image) }}" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
    <h3 class="text-xl font-semibold text-center mt-2">{{$title}}</h3>
    <p class="text-gray-600 text-center mt-2">${{$price}}</p>

    <div class="px-6 pt-4">
        <Link href="{{route('addToCart',$product)}}"
            class="bg-[#853F8F] text-white hover:bg-[#EEF2FF] hover:text-[#0A58D4] font-bold py-2 px-4 rounded-full">Buy
        Now</Link>
    </div>
</div>