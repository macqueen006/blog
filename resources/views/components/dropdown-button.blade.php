@props([
    'outline' => false,
    'plain' => false,
    'color' => 'dark',
])

@php
    $baseClasses = 'relative isolate inline-flex items-center justify-center gap-x-2 rounded-md text-sm font-semibold px-[calc(0.75rem-1px)] py-[calc(0.375rem-1px)] focus:outline-hidden data-[focus]:outline-2 data-[focus]:outline-offset-2 data-[focus]:outline-blue-500';

    $outlineClasses = $outline ? 'border border-zinc-950/10 text-zinc-950 hover:bg-zinc-950/2.5 active:bg-zinc-950/2.5 dark:border-white/15 dark:text-white dark:hover:bg-white/5 dark:active:bg-white/5' : '';

    $plainClasses = $plain ? 'border-0 p-1 hover:bg-zinc-950/5 dark:hover:bg-white/10' : '';

    $classes = trim("$baseClasses $outlineClasses $plainClasses cursor-pointer");
@endphp

<button
    {{ $attributes->merge(['class' => $classes, 'type' => 'button']) }}
    @click="open = !open"
    :aria-expanded="open"
    aria-haspopup="menu">
    <span class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)] -translate-x-1/2 -translate-y-1/2 pointer-fine:hidden" aria-hidden="true"></span>
    {{ $slot }}
</button>
