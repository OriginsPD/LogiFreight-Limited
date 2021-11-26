@props([
    'message' => false,
    'status' => false
])


@php

$theme = ($status) ? 'red' : 'green'

@endphp


<div x-data="{ Alert: false }"
     x-on:show-alert.window="Alert = true; setTimeout(() => { Alert = false },3000)"

     :class="Alert ? '-translate-x-0' : 'translate-x-full'"
    class="w-auto fixed z-40 top-20 transform transition duration-300 right-0 rounded-l-2xl text-white h-16 bg-white  shadow-2xl">

    <div
         x-transition.duration.300ms.origin.right
         x-transition.out.duration.300ms.opacity.origin.right
        class="container flex items-center  justify-between px-4 py-2 mx-auto">

        <div class="flex items-center justify-center inset-0">

            @if($status)

                <i class="fas fa-exclamation-triangle text-red-600 my-4"></i>

            @else

                <i class="fas fa-shield-check text-green-600 my-4"></i>

            @endif

            <div class="mx-3 my-auto font-bold w-full text-right my-3.5 text-{{ $theme }}-500 ">{{ $message }}</div>

        </div>

        {{ $slot }}

    </div>

</div>
