@props(['active', 'as' => 'Link'])

@php
$classes = ($active ?? false)
? 'block pl-3 pr-4 py-2 border-buttonColor0 rounded-full text-base font-medium text-buttonColor0 bg-indigo-50
focus:outline-none
focus:text-buttonColor1 focus:bg-buttonColor0 focus:border-buttonColor1 transition duration-150 ease-in-out'
: 'block pl-3 pr-4 py-2 rounded-full border-transparent text-base font-medium text-gray-600 hover:text-gray-800
hover:bg-gray-50
hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition
duration-150 ease-in-out';
@endphp

<{{ $as }} {{ $attributes->class($classes) }}>
    {{ $slot }}
</{{ $as }}>