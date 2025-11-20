@props([
    'href' => null,
    'disabled' => false,
])

@php
    $baseClasses = 'group cursor-default rounded-lg px-3 py-1.5 focus:outline-hidden text-left text-sm/6 text-zinc-950 dark:text-white w-full min-w-[90px] hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white transition-colors';

    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';

    $classes = trim("$baseClasses $disabledClasses");
@endphp

@if($href && !$disabled)
    <a href="{{ $href }}"
       {{ $attributes->merge(['class' => $classes]) }}
       role="menuitem">
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge(['class' => $classes, 'type' => 'button']) }}
        role="menuitem"
        @if($disabled) disabled @endif>
        {{ $slot }}
    </button>
@endif
