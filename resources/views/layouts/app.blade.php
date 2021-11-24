<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
    @livewireStyles
</head>
<body class="h-auto antialiased bg-no-repeat font-sans"
      style="background-image: url('https://cdn.pixabay.com/photo/2017/10/23/22/37/dhl-2882823_960_720.jpg');
             background-size: cover">

<div class="bg-gray-900 h-screen pb-0.5 w-screen bg-opacity-80">

    @livewire('navigation.home.index-navi')

    @yield('content')

</div>

<!-- Footer End of Body -->
@livewireScripts
<script defer src="https://unpkg.com/@alpinejs/trap@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
