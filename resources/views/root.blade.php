<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {{-- meta tags --}}
    <meta name="description"
        content="Explore the rich flavors of Indian Saffron & Spices with Savzaika Impex Pvt. Ltd., Chandigarh. We are the leading manufacturer of herbs and spices in the UK, specializing in processing, packing, and marketing." />

    <meta name="keywords"
        content="Savzaika Impex Pvt. Ltd., Chandigarh, Indian Saffron, Spices, Herbs, Manufacturer, Processing, Packing, Marketing, UK, Flavors" />

    <meta name="author" content="https://savzaika.com/" />

    <meta name="robots" content="all" />

    <meta name="resource-type" content="document" />

    <meta name="page-topic" content="Indian Saffron & Spices Manufacturing" />

    <meta name="clientbase" content="Global" />

    <meta name="distribution" content="World Wide Web" />

    <meta name="audience" content="all" />

    <link rel="canonical" href="https://savzaika.com/" />

    <meta name="rating" content="general" />

    <meta id="googlebot" name="googlebot" content="index, follow">

    <meta name="expires" content="never" />

    <meta name="bingbot" content="index, follow" />

    <meta name="revisit-after" content="Daily" />

    <meta name="author" content="Savzaika Impex Pvt. Ltd." />

    <meta name="HandheldFriendly" content="True" />

    <meta name="geo.region" content="IN" />

    <meta name="State" content="Chandigarh" />

    <meta name="City" content="Chandigarh" />

    <meta name="subject" content="Indian Saffron & Spices Manufacturing" />

    <meta name="copyright" content="Copyright © Savzaika Impex Pvt. Ltd." />

    <meta name="google-site-verification" content="your-google-verification-code" />

    <meta name="og:type" content="article" />

    <meta name="og:title" content="Savzaika Impex Pvt. Ltd. Chandigarh | Indian Saffron & Spices" />

    <meta name="og:image" content="https://savzaika.com/images/logo.png" />

    <meta name="og:site_name" content="Savzaika Impex Pvt. Ltd." />

    <meta name="og:description"
        content="Explore the rich flavors of Indian Saffron & Spices with Savzaika Impex Pvt. Ltd., Chandigarh. We are the leading manufacturer of herbs and spices in the UK, specializing in processing, packing, and marketing." />

    <meta name="twitter:card" content="summary" />

    <meta name="twitter:desc"
        content="Explore the rich flavors of Indian Saffron & Spices with Savzaika Impex Pvt. Ltd., Chandigarh. We are the leading manufacturer of herbs and spices in the UK, specializing in processing, packing, and marketing." />

    <meta name="twitter:title" content="Savzaika Impex Pvt. Ltd. Chandigarh | Indian Saffron & Spices" />

    <meta name="abstract" content="Savzaika Impex Pvt. Ltd. Chandigarh | Indian Saffron & Spices" />

    <meta name="Classification" content="Indian Saffron & Spices Manufacturing with Savzaika Impex Pvt. Ltd." />

    <meta name="dc.source" content="https://savzaika.com/" />

    <meta name="dc.title" content="Savzaika Impex Pvt. Ltd. Chandigarh | Indian Saffron & Spices" />

    <meta name="dc.keywords"
        content="Savzaika Impex Pvt. Ltd., Chandigarh, Indian Saffron, Spices, Herbs, Manufacturer, Processing, Packing, Marketing, UK, Flavors" />

    <meta name="dc.subject" content="Indian Saffron & Spices Manufacturing" />

    <meta name="dc.description"
        content="Explore the rich flavors of Indian Saffron & Spices with Savzaika Impex Pvt. Ltd., Chandigarh. We are the leading manufacturer of herbs and spices in the UK, specializing in processing, packing, and marketing." />

    {{-- meta tags --}}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    @vite(['resources/js/app.js'])


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
        defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet"
        crossorigin="anonymous">
    @spladeHead

</head>

<body class="font-sans antialiased ">
    @splade


</body>

</html>
