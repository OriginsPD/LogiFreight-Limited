<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Admin Panel</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
    @livewireStyles

</head>
<body class="h-screen antialiased leading-none font-sans">


<div @click.away="isSlide = false" x-data="{ isSlide: false }">

    @livewire('navigation.admin.header')

    @livewire('navigation.admin.side-bar')

    @yield('content')

</div>

<!-- Footer End of Body -->
@livewireScripts
<script defer src="https://unpkg.com/@alpinejs/trap@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
