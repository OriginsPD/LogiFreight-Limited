@props([
    'class' => false,
])

@php

$classes = 'text-white text-xs font-semibold uppercase
            px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1
            ease-linear transition-all duration-150 ';

($class) ? $classes .= $class : $classes .='bg-indigo-500';

@endphp

<div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">

    <button
        {{ $attributes->merge(['class' => $classes]) }}
        type="button">

        {{ $slot }}

    </button>

</div>
