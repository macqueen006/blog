@props([
    'color' => 'zinc',
    'href' => null,
    'type' => 'button',
    'size' => 'md',
])

@php
    $baseClasses = 'inline-flex items-center gap-x-1.5 font-medium transition-colors duration-150 forced-colors:outline';

    // Size variants
    $sizeClasses = match($size) {
        'sm' => 'rounded px-1 py-0.5 text-xs/4',
        'md' => 'rounded-md px-1.5 py-0.5 text-xs/5 sm:text-xs/5',
        'lg' => 'rounded-md px-2 py-1 text-sm/5',
        default => 'rounded-md px-1.5 py-0.5 text-xs/5 sm:text-xs/5',
    };

    // Color variants - following the button pattern
    $colorClasses = match($color) {
        // Zinc/Default
        'zinc' => 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200 dark:bg-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-700',

        // Colors with opacity backgrounds
        'red' => 'bg-red-500/15 text-red-700 hover:bg-red-500/25 dark:text-red-400 dark:hover:bg-red-500/20',
        'orange' => 'bg-orange-500/15 text-orange-700 hover:bg-orange-500/25 dark:text-orange-400 dark:hover:bg-orange-500/20',
        'amber' => 'bg-amber-500/15 text-amber-700 hover:bg-amber-500/25 dark:text-amber-400 dark:hover:bg-amber-500/20',
        'yellow' => 'bg-yellow-500/15 text-yellow-700 hover:bg-yellow-500/25 dark:text-yellow-400 dark:hover:bg-yellow-500/20',
        'lime' => 'bg-lime-500/15 text-lime-700 hover:bg-lime-500/25 dark:text-lime-400 dark:hover:bg-lime-500/20',
        'green' => 'bg-green-500/15 text-green-700 hover:bg-green-500/25 dark:text-green-400 dark:hover:bg-green-500/20',
        'emerald' => 'bg-emerald-500/15 text-emerald-700 hover:bg-emerald-500/25 dark:text-emerald-400 dark:hover:bg-emerald-500/20',
        'teal' => 'bg-teal-500/15 text-teal-700 hover:bg-teal-500/25 dark:text-teal-400 dark:hover:bg-teal-500/20',
        'cyan' => 'bg-cyan-500/15 text-cyan-700 hover:bg-cyan-500/25 dark:text-cyan-400 dark:hover:bg-cyan-500/20',
        'sky' => 'bg-sky-500/15 text-sky-700 hover:bg-sky-500/25 dark:text-sky-400 dark:hover:bg-sky-500/20',
        'blue' => 'bg-blue-500/15 text-blue-700 hover:bg-blue-500/25 dark:text-blue-400 dark:hover:bg-blue-500/20',
        'indigo' => 'bg-indigo-500/15 text-indigo-700 hover:bg-indigo-500/25 dark:text-indigo-400 dark:hover:bg-indigo-500/20',
        'violet' => 'bg-violet-500/15 text-violet-700 hover:bg-violet-500/25 dark:text-violet-400 dark:hover:bg-violet-500/20',
        'purple' => 'bg-purple-500/15 text-purple-700 hover:bg-purple-500/25 dark:text-purple-400 dark:hover:bg-purple-500/20',
        'fuchsia' => 'bg-fuchsia-500/15 text-fuchsia-700 hover:bg-fuchsia-500/25 dark:text-fuchsia-400 dark:hover:bg-fuchsia-500/20',
        'pink' => 'bg-pink-500/15 text-pink-700 hover:bg-pink-500/25 dark:text-pink-400 dark:hover:bg-pink-500/20',
        'rose' => 'bg-rose-500/15 text-rose-700 hover:bg-rose-500/25 dark:text-rose-400 dark:hover:bg-rose-500/20',

        // Fallback
        default => 'bg-zinc-100 text-zinc-700 hover:bg-zinc-200 dark:bg-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-700',
    };

    // Focus ring colors for interactive badges
    $focusRingColor = match($color) {
        'red' => 'focus:ring-red-500',
        'orange' => 'focus:ring-orange-500',
        'amber' => 'focus:ring-amber-500',
        'yellow' => 'focus:ring-yellow-500',
        'lime' => 'focus:ring-lime-500',
        'green' => 'focus:ring-green-500',
        'emerald' => 'focus:ring-emerald-500',
        'teal' => 'focus:ring-teal-500',
        'cyan' => 'focus:ring-cyan-500',
        'sky' => 'focus:ring-sky-500',
        'blue' => 'focus:ring-blue-500',
        'indigo' => 'focus:ring-indigo-500',
        'violet' => 'focus:ring-violet-500',
        'purple' => 'focus:ring-purple-500',
        'fuchsia' => 'focus:ring-fuchsia-500',
        'pink' => 'focus:ring-pink-500',
        'rose' => 'focus:ring-rose-500',
        'zinc' => 'focus:ring-zinc-500',
        default => 'focus:ring-zinc-500',
    };

    // Determine if it's interactive (button or link)
    $isInteractive = $href !== null || $attributes->has('onclick') || $attributes->has('wire:click');

    // Add focus styles only for interactive elements
    $interactiveClasses = $isInteractive
        ? "cursor-pointer focus:outline-none focus:ring focus:ring-offset-0 focus:ring-offset-white dark:focus:ring-offset-zinc-900 {$focusRingColor}"
        : '';

    // Merge all classes
    $classes = trim("{$baseClasses} {$sizeClasses} {$colorClasses} {$interactiveClasses}");
@endphp

@if($href)
    {{-- Badge as Link --}}
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </a>
@elseif($isInteractive)
    {{-- Badge as Button --}}
    <button
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </button>
@else
    {{-- Badge as Span (non-interactive) --}}
    <span {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </span>
@endif
