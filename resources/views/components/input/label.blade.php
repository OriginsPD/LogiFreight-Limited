@props([
    'colspan' => false,
    'for' => false,
    'label',

])

<div class="{{ $colspan }}">

    <label {{ $attributes->class('text-gray-700 capitalize text-xs dark:text-gray-200') }} {{ $for }}>

        {{ $label }}

        {{ $slot }}

    </label>

</div>
