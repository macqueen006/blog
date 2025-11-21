@props([
    'size' => 'sm',
    'open' => false,
])

@php
    $sizeClasses = match($size) {
        'xs' => 'sm:max-w-xs',
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        '5xl' => 'sm:max-w-5xl',
        default => 'sm:max-w-sm',
    };
@endphp

<div x-data="{ open: @js($open) }"
     x-modelable="open"
     x-on:open-alert.window="open = true"
     x-on:close-alert.window="open = false"
     x-on:keydown.escape.window="open = false"
     x-show="open"
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     role="dialog"
     aria-modal="true"
    {{ $attributes }}
>
    {{-- Backdrop --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-zinc-950/15 dark:bg-zinc-950/50"
        @click="open = false"
        aria-hidden="true"
    ></div>

    {{-- Dialog Panel --}}
    <div class="fixed inset-0 w-screen overflow-y-auto pt-6 sm:pt-0">
        <div
            class="grid min-h-full grid-rows-[1fr_auto_1fr] justify-items-center p-8 sm:grid-rows-[1fr_auto_3fr] sm:p-4">
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @click.away="open = false"
                tabindex="-1"
                class="{{ $sizeClasses }} row-start-2 w-full rounded-2xl bg-white p-4 shadow-lg ring-1 ring-zinc-950/10 sm:rounded-lg sm:p-6 dark:bg-zinc-900 dark:ring-white/10"
            >
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

