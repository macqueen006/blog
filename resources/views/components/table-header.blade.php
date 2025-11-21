@props([])

@php
    $baseClasses = 'border-b border-b-zinc-950/10 px-4 py-2 font-medium first:pl-(--gutter,--spacing(2)) last:pr-(--gutter,--spacing(2)) dark:border-b-white/10 sm:first:pl-1 sm:last:pr-1';
@endphp

<th {{ $attributes->class([$baseClasses]) }}>
    {{ $slot }}
</th>
