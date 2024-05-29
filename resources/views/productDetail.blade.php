<x-splade-modal max-width="7xl">
    <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <img alt="ecommerce"
                class="lg:w-1/2 w-full  transition duration-700 ease-in-out hover:scale-110 object-cover rounded border border-gray-200"
                src="{{ asset('storage/' . $product->media->file_path) }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"></h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                <p class="leading-relaxed">{{ $product->description }}</p>

                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">

                </div>

                <div>
                    <div
                        class=" flex space-x-2 sm:flex-row items-center space-y-4 sm:space-y-0
                sm:space-x-4">
                        <button class="bg-gray-300 text-gray-600 px-2 py-1 rounded sm:px-3 sm:py-2"
                            id="decrementQuantity">-</button>
                        <input type="text" class="border text-center w-10 sm:w-14" value="1" id="quantity">
                        <button
                            class="bg-buttonColor0 hover:bg-buttonColor1 text-white px-2 py-1 rounded sm:px-3 sm:py-2"
                            id="incrementQuantity">+</button>
                        <input type="text" id="cart_productId" hidden value="">
                    </div>
                </div>

                <p class="mt-4"><span class="font-semibold">Weight:</span> <span>{{ $product->weight }} G</span></p>
                <div class="flex mt-2 items-center pb-5 border-b-2 border-gray-200 mb-5">
                </div>

                <div class="flex justify-between">
                    <span class="title-font font-medium text-2xl text-gray-900">₹ {{ $product->price }}</span>
                    <div>
                        <form method="post" action="{{ route('addToCart', $product) }}">
                            @csrf
                            <input type="text" value="" id="passingQuantity" hidden name="passingQuantity">
                            <button type="submit"
                                class="flex ml-auto text-white bg-[#853F90] border-0 py-2 px-6 focus:outline-none hover:bg-indigo-700 hover:text-white rounded">Add
                                To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-splade-script>
            var quantity = 1;
            const incrementQuantity = document.getElementById('incrementQuantity');
            const passingQuantity = document.getElementById('passingQuantity');
            const changeQuantity = document.getElementById('quantity');

            incrementQuantity.addEventListener('click', function(){
            console.log('incrementWorking');
            quantity++;
            console.log('quantity',quantity);
            changeQuantity.value = quantity;
            passingQuantity.value = quantity;
            console.log('changequanitty',changeQuantity.value)
            });
            const decrementQuantity = document.getElementById('decrementQuantity');
            decrementQuantity.addEventListener('click', function(){
            console.log('DecrementWorking')
            if(quantity>1){
            quantity--;
            }else{
            quantity = 1;
            }
            console.log('quantity',quantity);;
            changeQuantity.value = quantity
            passingQuantity.value = quantity

            console.log('changequanitty',changeQuantity.value)
            });
        </x-splade-script>
    </section>
</x-splade-modal>
