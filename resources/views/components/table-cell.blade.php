@props([
    'href' => null,
    'target' => null,
    'title' => null,
])

@php
    $baseClasses = 'relative px-4 first:pl-(--gutter,--spacing(2)) last:pr-(--gutter,--spacing(2)) sm:first:pl-1 sm:last:pr-1';

    // Dense mode handled via parent data attribute
    $paddingClasses = '[[data-dense]_&]:py-2.5 [[data-dense]_&]:sm:py-2 py-4';

    // Border handling for striped vs normal
    $borderClasses = '[[data-striped]_&]:border-transparent border-b border-zinc-950/5 dark:border-white/5';

    // Striped background
    $stripedClasses = '[[data-striped]_&]:even:bg-zinc-950/[2.5%] dark:[[data-striped]_&]:even:bg-white/[2.5%]';

    // Grid lines
    $gridClasses = '[[data-grid]_&]:border-l [[data-grid]_&]:border-l-zinc-950/5 dark:[[data-grid]_&]:border-l-white/5 [[data-grid]_&]:first:border-l-0';
@endphp

<td {{ $attributes->class([$baseClasses, $paddingClasses, $borderClasses, $stripedClasses, $gridClasses]) }}>
    @if($href)
        <a
            href="{{ $href }}"
            @if($target) target="{{ $target }}" @endif
            @if($title) title="{{ $title }}" @endif
            data-row-link
            class="absolute inset-0 focus:outline-none"
        ></a>
    @endif
    {{ $slot }}
</td>
