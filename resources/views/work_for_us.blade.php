@extends('layouts.layout')

@section('content')
    @php
        session()->put('checkoutDetails.checkoutPrice.discount', null);
    @endphp

    <x-hero-section :title="'Work for us'" :description="''"> </x-hero-section>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6 mb-10 text-center sm:text-justify">
        <h1 class="mb-4 text-5xl sm:text-5xl font-bold text-buttonColor1 font-sans">Work For Us</h1>
        <p class="text-base text-lg sm:text-md">New flavours, new combinations, new ways of bringing flavour to life. To
            your life.
            Because in almost every UK kitchen cupboard there’s at least one flavour ingredient that’s the product of
            our expertise.</p>
        <p class="text-base text-lg sm:text-md">
            We have two manufacturing plants, one for our ‘wet’ range and one for ‘dry’. Between them, we have the
            capacity to pack formats ranging from small glass jars for retail outlets to one-ton bulk containers used
            by food manufacturers.
        </p>
    </div>
@endsection
