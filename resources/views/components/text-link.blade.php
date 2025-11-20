@props([
    'href' => '#',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'text-zinc-950 underline decoration-zinc-950/50 data-[hover]:decoration-zinc-950 dark:text-white dark:decoration-white/50 dark:data-[hover]:decoration-white']) }}
    x-data="{ hover: false }"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    :data-hover="hover ? '' : undefined"
>
    {{ $slot }}
</a>
