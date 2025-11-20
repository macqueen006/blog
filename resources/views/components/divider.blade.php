@props([
    'soft' => false,
])

@php
    $colorClasses = $soft
        ? 'border-zinc-950/5 dark:border-white/5'
        : 'border-zinc-950/10 dark:border-white/10';
@endphp

<hr {{ $attributes->merge(['class' => 'w-full border-t ' . $colorClasses]) }} />
