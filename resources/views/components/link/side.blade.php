@props([
    'active' => false,
])

@php

    $classes = ($active ?? false)
                ? 'block px-4 py-2 mt-2 text-sm cursor-pointer font-semibold text-white bg-gray-500 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-500 hover:text-white focus:text-white hover:bg-gray-500 focus:bg-gray-500 focus:outline-none focus:shadow-outline'
                : 'block px-4 py-2 mt-2 text-sm cursor-pointer font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-500 hover:text-white focus:text-white hover:bg-gray-500 focus:bg-gray-500 focus:outline-none focus:shadow-outline'

@endphp

<a {{ $attributes->merge(['class' => $classes ]) }}>


    {{ $slot }}

</a>
