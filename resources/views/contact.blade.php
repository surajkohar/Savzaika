@extends('layouts.layout')
@section('content')
    @php
        session()->put('checkoutDetails.checkoutPrice.discount', null);
    @endphp
    <x-hero-section :title="'Contact us'" :description="''"> </x-hero-section>
    <section class="mt-5 mb-5 w-full">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="md:w-1/2 w-full mb-4 md:mb-0">
                    <div class="p-4">
                        <form id="contactForm" action='{{ route('contact.submit') }}' method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" id="name" name="name" required placeholder="Enter Name"
                                    class="mt-1 p-2 border rounded-md w-full">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" required placeholder="Enter Email"
                                    class="mt-1 p-2 border rounded-md w-full">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" id="phone" name="phone" required placeholder="Enter Number"
                                    class="mt-1 p-2 border rounded-md w-full">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" id="address" name="address" required placeholder="Enter Address"
                                    class="mt-1 p-2 border rounded-md w-full">
                            </div>
                            <div class="mb-3">
                                <label for="msg" class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea id="msg" name="msg" class="mt-1 p-2 border rounded-md w-full" rows="3"></textarea>
                            </div>
                            <button type="submit" name="submit_form" id="sendMessageButton"
                                class="bg-buttonColor0 text-white p-2 rounded-md">Submit</button>
                        </form>
                        <div id="thankYouMessage" class="hidden mt-4">
                            <h1 class="text-green-700 font-bold text-2xl">Thank You</h1>
                            <p class="text-purple-700 font-bold">We have received your form submission. If you want an
                                instant response, call on this number: 85578-78801 & 94173-93931.</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 w-full">
                    <div class="p-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13745.578448037335!2d75.9519651743615!3d30.538153188679615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391069a660696aef%3A0x3bc789e57615106b!2sChandigarh%2C%20Punjab%20148023!5e0!3m2!1sen!2sin!4v1667876554156!5m2!1sen!2sin"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission behavior.
                console.log("hii");
                var formData = $(this).serialize();
                console.log("bbbbb", formData);
                //ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('contact.submit') }}',
                    data: formData,
                    success: function(data) {
                        console.log('data');
                        $('#contactForm').hide();
                        $('#thankYouMessage').show();
                        console.log(
                            'Form submitted successfully.');
                    },
                    error: function(xhr, status, error) {
                        console.log('Form submission failed:',
                            error);
                    }
                });
            });
        });
    </script>
@endsection
