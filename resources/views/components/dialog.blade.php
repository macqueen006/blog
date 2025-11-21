@props([
    'size' => 'lg',
])

@php
    $sizeClasses = [
        'xs' => 'sm:max-w-xs',
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        '5xl' => 'sm:max-w-5xl',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['lg'];
@endphp

<div
    x-cloak
    x-show="open"
    @keydown.escape.window="open = false"
    class="fixed inset-0 z-50"
    role="dialog"
    aria-modal="true"
    x-transition:enter="transition duration-100 ease-out"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition duration-100 ease-in"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-zinc-950/25 dark:bg-zinc-950/50"
        @click="open = false"
        aria-hidden="true"
    ></div>

    {{-- Dialog container --}}
    <div class="fixed inset-0 w-screen overflow-y-auto pt-6 sm:pt-0">
        <div class="grid min-h-full grid-rows-[1fr_auto] justify-items-center sm:grid-rows-[1fr_auto_3fr] sm:p-4">
            <div
                {{ $attributes->merge(['class' => $sizeClass . ' row-start-2 w-full min-w-0 bg-white p-8 shadow-lg ring-1 ring-zinc-950/10 sm:mb-auto rounded-md dark:bg-zinc-900 dark:ring-white/10']) }}
                @click.stop
                x-transition:enter="transition duration-100 ease-out"
                x-transition:enter-start="translate-y-12 opacity-0 sm:scale-95"
                x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
                x-transition:leave="transition duration-100 ease-in"
                x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
                x-transition:leave-end="translate-y-12 opacity-0 sm:scale-95"
                @click.away="open = false"
            >
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
