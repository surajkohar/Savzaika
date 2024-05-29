@extends('layouts.layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>Thank You</title>
    </head>

    <body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg max-w-md">
            <div class="text-2xl text-center font-semibold text-green-600 mb-4">Thank You for Your Order</div>
            <p class="text-center text-gray-600 mb-6">Your order was successful. We appreciate your business.</p>
            <p class="text-center text-gray-600 mb-6"> Please check your email for comprehensive details regarding your
                order.</p>
            <a href="/"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-full text-center block w-1/2 mx-auto">Return
                to Homepage</a>
        </div>
    </body>

    </html>
@endsection
