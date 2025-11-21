@props([
    'href' => null,
    'target' => null,
    'title' => null,
])

@php
    $classes = 'group';

    if ($href) {
        $classes .= ' has-[[data-row-link][data-focus]]:outline-2 has-[[data-row-link][data-focus]]:-outline-offset-2 has-[[data-row-link][data-focus]]:outline-blue-500 dark:focus-within:bg-white/[2.5%] hover:bg-zinc-950/[2.5%] dark:hover:bg-white/[2.5%]';
    }
@endphp

<tr {{ $attributes->class([$classes]) }}>
    @if($href)
        {{ $slot }}
    @else
        {{ $slot }}
    @endif
</tr>
