@extends('layouts.layout')
@section('content')

@php
session()->put('checkoutDetails.checkoutPrice.discount', null);
@endphp

<x-hero-section :title="'Our Company'" :description="''">
</x-hero-section>

<div class="container mx-auto mt-6 w-[80%] space-x-6 lg:space-y-6 ">
	<div class="content-wrapper space-y-6 mt-6 lg:flex lg:space-x-6 ">
		<div class="text-section space-y-6 lg:w-1/2">
			<h1 class="text-4xl font-bold  ">The Richest Masala in the world</h1>
			<p class="text-md">Savzaika Impex Pvt. Ltd. Chandigarh was established in 2022 by expert professionals from
				the
				field of
				Life Sciences to bring farm-fresh, NABL-accredited products to your doorsteps.</p>
			<div class="sub-paragraph border-l-2 border-black p-2">
				<p class="italic text-md">Spices have always been woven into the history and culture of India, with many
					historical
					tales referencing them and no meal complete without them. Savzaika was founded to create an avenue
					for
					the world to continue enjoying these incredible spices.</p>
			</div>
			<div class="paragraph p-2">
				<p class="text-md"><strong>Mission</strong> To deliver the best quality spices to each and every
					household in the world.
				</p>
			</div>
		</div>
		<div class="img-section lg:1/2 ">
			<img src="https://waffy-demo.myshopify.com/cdn/shop/files/abo-1.jpg?v=1622288419" alt="">
		</div>
	</div>
</div>






<div class="flavour-wrapper bg-gray-100 py-12 my-12">
	<div class="container mx-auto mt-6 w-[80%]   space-x-6 lg:flex lg:items-center lg:justify-center lg:space-y-6 ">

		<div class="text my-6 space-y-4 w-full">
			<h1 class="text-5xl font-bold text-center text-buttonColor1">Unique Flavours Spices</h1>
			<p class="text-center">
				Quisque volutpat mattis eros.
			</p>
			<p class="text-center text-yellow text-4xl font-bold"> ***</p>

		</div>



	</div>
	<div class="list-wrapper container mx-auto lg:w-[80%]  lg:grid lg:grid-cols-2 lg:gaps-6 ">
		<div class="list-1  p-6 flex space-x-2">
			<div class="img-area">
				<svg class="svg-icon transition duration-0 hover:duration-150 ease-in-out w-16 h-16 border-1 border-black p-4  bg-yellow hover:bg-black hover:text-white "
					style="vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024"
					version="1.1" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M913.843134 302.744115c0.008186-4.178159-0.989537-8.40953-3.281743-12.260232l-117.731378-149.655462c-4.318352-7.242961-12.135388-11.685133-20.570501-11.685133l-117.731378 0-159.635767 0-245.439992 0c-8.43409 0-16.251126 4.442172-20.569478 11.685133l-117.731378 149.655462c-2.292206 3.850701-3.289929 8.082072-3.281743 12.260232l-0.094144 0 0 501.982856c0 49.231261 37.851073 87.799672 86.147032 87.799672l300.969703 0 159.635767 0 173.262112 0c48.295959 0 86.146009-38.568411 86.146009-87.799672l0-501.982856L913.843134 302.744115zM758.658749 177.034019l102.034884 125.710097L526.81952 302.744115 526.81952 177.034019l127.708614 0L758.658749 177.034019zM263.055185 177.034019l231.837182 0 0 125.710097L161.018254 302.744115 263.055185 177.034019zM827.790246 844.63489 654.528134 844.63489l-159.635767 0L193.922664 844.63489c-21.450545 0-38.256302-17.531282-38.256302-39.908942l0-454.092126 710.379163 0 0 454.092126C866.045525 827.103608 849.240791 844.63489 827.790246 844.63489z" />
				</svg>
				{{-- <img src="" alt=""> --}}
			</div>
			<div class="text-area space-y-2">
				<h1 class="text-2xl font-bold">Flavours</h1>
				<p>
					Sed vestibulum nulla elementum auctor tincidunt. Aliquam sit amet cursus mauris. Sed vitae
					mattis ipsum. Vestibulum enim nulla, sollicitudin ac hendrerit nec, tempor quis nisl
				</p>
			</div>
		</div>
		<div class="list-1  p-6 flex space-x-2">
			<div class="img-area">
				<svg class="svg-icon w-16 h-16 border-1 border-black p-4 bg-yellow hover:bg-black hover:text-white "
					style="vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024"
					version="1.1" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M913.843134 302.744115c0.008186-4.178159-0.989537-8.40953-3.281743-12.260232l-117.731378-149.655462c-4.318352-7.242961-12.135388-11.685133-20.570501-11.685133l-117.731378 0-159.635767 0-245.439992 0c-8.43409 0-16.251126 4.442172-20.569478 11.685133l-117.731378 149.655462c-2.292206 3.850701-3.289929 8.082072-3.281743 12.260232l-0.094144 0 0 501.982856c0 49.231261 37.851073 87.799672 86.147032 87.799672l300.969703 0 159.635767 0 173.262112 0c48.295959 0 86.146009-38.568411 86.146009-87.799672l0-501.982856L913.843134 302.744115zM758.658749 177.034019l102.034884 125.710097L526.81952 302.744115 526.81952 177.034019l127.708614 0L758.658749 177.034019zM263.055185 177.034019l231.837182 0 0 125.710097L161.018254 302.744115 263.055185 177.034019zM827.790246 844.63489 654.528134 844.63489l-159.635767 0L193.922664 844.63489c-21.450545 0-38.256302-17.531282-38.256302-39.908942l0-454.092126 710.379163 0 0 454.092126C866.045525 827.103608 849.240791 844.63489 827.790246 844.63489z" />
				</svg>
				{{-- <img src="" alt=""> --}}
			</div>
			<div class="text-area space-y-2">
				<h1 class="text-2xl font-bold">Export</h1>
				<p>
					Sed vestibulum nulla elementum auctor tincidunt. Aliquam sit amet cursus mauris. Sed vitae
					mattis ipsum. Vestibulum enim nulla, sollicitudin ac hendrerit nec, tempor quis nisl
				</p>
			</div>
		</div>
		<div class="list-1  p-6 flex space-x-2">
			<div class="img-area">
				<svg class="svg-icon w-16 h-16 border-1 border-black p-4 bg-yellow hover:bg-black hover:text-white "
					style="vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024"
					version="1.1" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M913.843134 302.744115c0.008186-4.178159-0.989537-8.40953-3.281743-12.260232l-117.731378-149.655462c-4.318352-7.242961-12.135388-11.685133-20.570501-11.685133l-117.731378 0-159.635767 0-245.439992 0c-8.43409 0-16.251126 4.442172-20.569478 11.685133l-117.731378 149.655462c-2.292206 3.850701-3.289929 8.082072-3.281743 12.260232l-0.094144 0 0 501.982856c0 49.231261 37.851073 87.799672 86.147032 87.799672l300.969703 0 159.635767 0 173.262112 0c48.295959 0 86.146009-38.568411 86.146009-87.799672l0-501.982856L913.843134 302.744115zM758.658749 177.034019l102.034884 125.710097L526.81952 302.744115 526.81952 177.034019l127.708614 0L758.658749 177.034019zM263.055185 177.034019l231.837182 0 0 125.710097L161.018254 302.744115 263.055185 177.034019zM827.790246 844.63489 654.528134 844.63489l-159.635767 0L193.922664 844.63489c-21.450545 0-38.256302-17.531282-38.256302-39.908942l0-454.092126 710.379163 0 0 454.092126C866.045525 827.103608 849.240791 844.63489 827.790246 844.63489z" />
				</svg>
				{{-- <img src="" alt=""> --}}
			</div>
			<div class="text-area space-y-2">
				<h1 class="text-2xl font-bold">Cultivation</h1>
				<p>
					Sed vestibulum nulla elementum auctor tincidunt. Aliquam sit amet cursus mauris. Sed vitae
					mattis ipsum. Vestibulum enim nulla, sollicitudin ac hendrerit nec, tempor quis nisl
				</p>
			</div>
		</div>
		<div class="list-1  p-6 flex space-x-2">
			<div class="img-area">
				<svg class="svg-icon w-16 h-16 border-1 border-black p-4 bg-yellow hover:bg-black hover:text-white "
					style="vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024"
					version="1.1" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M913.843134 302.744115c0.008186-4.178159-0.989537-8.40953-3.281743-12.260232l-117.731378-149.655462c-4.318352-7.242961-12.135388-11.685133-20.570501-11.685133l-117.731378 0-159.635767 0-245.439992 0c-8.43409 0-16.251126 4.442172-20.569478 11.685133l-117.731378 149.655462c-2.292206 3.850701-3.289929 8.082072-3.281743 12.260232l-0.094144 0 0 501.982856c0 49.231261 37.851073 87.799672 86.147032 87.799672l300.969703 0 159.635767 0 173.262112 0c48.295959 0 86.146009-38.568411 86.146009-87.799672l0-501.982856L913.843134 302.744115zM758.658749 177.034019l102.034884 125.710097L526.81952 302.744115 526.81952 177.034019l127.708614 0L758.658749 177.034019zM263.055185 177.034019l231.837182 0 0 125.710097L161.018254 302.744115 263.055185 177.034019zM827.790246 844.63489 654.528134 844.63489l-159.635767 0L193.922664 844.63489c-21.450545 0-38.256302-17.531282-38.256302-39.908942l0-454.092126 710.379163 0 0 454.092126C866.045525 827.103608 849.240791 844.63489 827.790246 844.63489z" />
				</svg>
				{{-- <img src="" alt=""> --}}
			</div>
			<div class="text-area space-y-2">
				<h1 class="text-2xl font-bold">Testing</h1>
				<p>
					Sed vestibulum nulla elementum auctor tincidunt. Aliquam sit amet cursus mauris. Sed vitae
					mattis ipsum. Vestibulum enim nulla, sollicitudin ac hendrerit nec, tempor quis nisl
				</p>
			</div>
		</div>
	</div>

</div>

<div class="about-section my-12">
	<div class="container mx-auto mt-6 w-[80%]   space-x-6 lg:space-y-6 ">

		<div class="text my-6 space-y-4 w-full">
			<h1 class="text-5xl font-bold text-center text-buttonColor1">A unique blended taste</h1>
			<p class="text-center">
				Pellentesque habitant morbi tristique senectus et netus et male.
			</p>
			<p class="text-center text-yellow text-4xl font-bold"> ***</p>

		</div>
		<div class="content-wrapper space-y-6 lg:flex lg:space-x-6 ">


			<div class="img-section lg:w-1/2">
				<img src="https://waffy-demo.myshopify.com/cdn/shop/files/abo-2_770x.jpg?v=1622288447 " alt="">
			</div>
			<div class="text-section space-y-6 lg:w-1/2">
				<h1 class="text-2xl font-bold text-buttonColor1 ">The finest spice</h1>
				<p class="justify-center text-md ">
					Donec arcu purus, euismod nec eleifend et, luctus efficitur erat. Pellentesque at justo porttitor
					quis ornare ante integer quis ornare ante. Phasellus vel aliquam libero. Donec arcu purus, euismod
					nec eleifend et, luctus efficitur erat. Pellentesque at justo porttitor quis ornare ante integer
					quis ornare ante. Phasellus vel aliquam libero.
				</p>
			</div>

		</div>
		<div class="content-wrapper space-y-6 mt-6 lg:flex lg:flex-row-reverse lg:space-x-6 ">


			<div class="img-section ">
				<img src="https://waffy-demo.myshopify.com/cdn/shop/files/abo-3_770x.jpg?v=1622288462" alt="">
			</div>
			<div class="text-section space-y-6 text-right lg:p-4 lg:w-1/2">
				<h1 class="text-2xl font-bold text-buttonColor1 ">The premium flavor</h1>
				<p class="justify-center text-md ">
					Pellentesque at justo porttitor quis ornare ante integer quis ornare ante. Phasellus vel aliquam
					libero. Donec arcu purus, euismod nec eleifend et, luctus efficitur erat. Pellentesque at justo
					porttitor quis ornare ante integer quis ornare ante. Phasellus vel aliquam libero. Donec arcu purus,
					euismod nec eleifend et, luctus efficitur erat.
				</p>
			</div>

		</div>


	</div>
</div>

{{-- <div class="container mt-5 mb-4">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="bringing">
				<h1>Our Company</h1>
				<p>Savzaika Impex Pvt. Ltd. Chandigarh was established in 2022 by expert professionals from the field of
					Life Sciences to bring farm-fresh, NABL-accredited products to your doorsteps. <br>

					Spices have always been woven into the history and culture of India, with many historical tales
					referencing them and no meal complete without them. Savzaika was founded to create an avenue for the
					world to continue enjoying these incredible spices. <br>

					<strong>Mission:</strong> To deliver the best quality spices to each and every household in the
					world.
				</p>
			</div>

		</div>
	</div>
</div> --}}

@endsection