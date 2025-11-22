@props([
    'type' => 'button',
    'color' => 'dark',
    'size' => 'md',
    'outline' => false,
    'plain' => false,
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'rounded' => 'md',
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-semibold transition-all duration-150';

    // Size variants
    $sizeClasses = match($size) {
        'xs' => 'px-2 py-1 text-xs',
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-5 py-2.5 text-base',
        'xl' => 'px-6 py-3 text-base',
        default => 'px-4 py-2 text-sm',
    };

    // Border radius variants
    $roundedClasses = match($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        '2xl' => 'rounded-2xl',
        '3xl' => 'rounded-3xl',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    // Icon size based on button size
    $iconSize = match($size) {
        'xs' => 'size-3',
        'sm' => 'size-3.5',
        'md' => 'size-4',
        'lg' => 'size-5',
        'xl' => 'size-6',
        default => 'size-4',
    };

    // Focus ring colors that match button colors
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
        'dark' => 'focus:ring-zinc-900 dark:focus:ring-white',
        default => 'focus:ring-zinc-900',
    };

    $colorClasses = match(true) {
    $plain => 'text-zinc-600 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-zinc-200',

    // Special cases
    $outline && $color === 'dark' => 'border border-zinc-900 text-zinc-900 hover:bg-zinc-900 hover:text-white dark:border-white dark:text-white dark:hover:bg-white dark:hover:text-black',
    $color === 'dark' => 'bg-zinc-900 text-white hover:bg-zinc-800 dark:bg-white dark:text-black dark:hover:bg-zinc-100',

    // explicit colors
    $outline && $color === 'red' => 'border border-red-500 text-red-600 hover:bg-red-50 dark:border-red-400 dark:text-red-400 dark:hover:bg-red-950',
    $outline && $color === 'orange' => 'border border-orange-500 text-orange-600 hover:bg-orange-50 dark:border-orange-400 dark:text-orange-400 dark:hover:bg-orange-950',
    $outline && $color === 'amber' => 'border border-amber-500 text-amber-600 hover:bg-amber-50 dark:border-amber-400 dark:text-amber-400 dark:hover:bg-amber-950',
    $outline && $color === 'yellow' => 'border border-yellow-500 text-yellow-600 hover:bg-yellow-50 dark:border-yellow-400 dark:text-yellow-400 dark:hover:bg-yellow-950',
    $outline && $color === 'lime' => 'border border-lime-500 text-lime-600 hover:bg-lime-50 dark:border-lime-400 dark:text-lime-400 dark:hover:bg-lime-950',
    $outline && $color === 'green' => 'border border-green-500 text-green-600 hover:bg-green-50 dark:border-green-400 dark:text-green-400 dark:hover:bg-green-950',
    $outline && $color === 'emerald' => 'border border-emerald-500 text-emerald-600 hover:bg-emerald-50 dark:border-emerald-400 dark:text-emerald-400 dark:hover:bg-emerald-950',
    $outline && $color === 'teal' => 'border border-teal-500 text-teal-600 hover:bg-teal-50 dark:border-teal-400 dark:text-teal-400 dark:hover:bg-teal-950',
    $outline && $color === 'cyan' => 'border border-cyan-500 text-cyan-600 hover:bg-cyan-50 dark:border-cyan-400 dark:text-cyan-400 dark:hover:bg-cyan-950',
    $outline && $color === 'sky' => 'border border-sky-500 text-sky-600 hover:bg-sky-50 dark:border-sky-400 dark:text-sky-400 dark:hover:bg-sky-950',
    $outline && $color === 'blue' => 'border border-blue-500 text-blue-600 hover:bg-blue-50 dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-950',
    $outline && $color === 'indigo' => 'border border-indigo-500 text-indigo-600 hover:bg-indigo-50 dark:border-indigo-400 dark:text-indigo-400 dark:hover:bg-indigo-950',
    $outline && $color === 'violet' => 'border border-violet-500 text-violet-600 hover:bg-violet-50 dark:border-violet-400 dark:text-violet-400 dark:hover:bg-violet-950',
    $outline && $color === 'purple' => 'border border-purple-500 text-purple-600 hover:bg-purple-50 dark:border-purple-400 dark:text-purple-400 dark:hover:bg-purple-950',
    $outline && $color === 'fuchsia' => 'border border-fuchsia-500 text-fuchsia-600 hover:bg-fuchsia-50 dark:border-fuchsia-400 dark:text-fuchsia-400 dark:hover:bg-fuchsia-950',
    $outline && $color === 'pink' => 'border border-pink-500 text-pink-600 hover:bg-pink-50 dark:border-pink-400 dark:text-pink-400 dark:hover:bg-pink-950',
    $outline && $color === 'rose' => 'border border-rose-500 text-rose-600 hover:bg-rose-50 dark:border-rose-400 dark:text-rose-400 dark:hover:bg-rose-950',
    $outline && $color === 'zinc' => 'border border-zinc-300 text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-300 dark:hover:bg-zinc-800',

    // Solid buttons - explicit colors
    $color === 'red' => 'bg-red-600 text-white hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600',
    $color === 'orange' => 'bg-orange-600 text-white hover:bg-orange-700 dark:bg-orange-500 dark:hover:bg-orange-600',
    $color === 'amber' => 'bg-amber-600 text-white hover:bg-amber-700 dark:bg-amber-500 dark:hover:bg-amber-600',
    $color === 'yellow' => 'bg-yellow-600 text-white hover:bg-yellow-700 dark:bg-yellow-500 dark:hover:bg-yellow-600',
    $color === 'lime' => 'bg-lime-600 text-white hover:bg-lime-700 dark:bg-lime-500 dark:hover:bg-lime-600',
    $color === 'green' => 'bg-green-600 text-white hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600',
    $color === 'emerald' => 'bg-emerald-600 text-white hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600',
    $color === 'teal' => 'bg-teal-600 text-white hover:bg-teal-700 dark:bg-teal-500 dark:hover:bg-teal-600',
    $color === 'cyan' => 'bg-cyan-600 text-white hover:bg-cyan-700 dark:bg-cyan-500 dark:hover:bg-cyan-600',
    $color === 'sky' => 'bg-sky-600 text-white hover:bg-sky-700 dark:bg-sky-500 dark:hover:bg-sky-600',
    $color === 'blue' => 'bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600',
    $color === 'indigo' => 'bg-indigo-600 text-white hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600',
    $color === 'violet' => 'bg-violet-600 text-white hover:bg-violet-700 dark:bg-violet-500 dark:hover:bg-violet-600',
    $color === 'purple' => 'bg-purple-600 text-white hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600',
    $color === 'fuchsia' => 'bg-fuchsia-600 text-white hover:bg-fuchsia-700 dark:bg-fuchsia-500 dark:hover:bg-fuchsia-600',
    $color === 'pink' => 'bg-pink-600 text-white hover:bg-pink-700 dark:bg-pink-500 dark:hover:bg-pink-600',
    $color === 'rose' => 'bg-rose-600 text-white hover:bg-rose-700 dark:bg-rose-500 dark:hover:bg-rose-600',
    $color === 'zinc' => 'bg-zinc-100 text-zinc-900 hover:bg-zinc-200 dark:bg-zinc-800 dark:text-white dark:hover:bg-zinc-700',

    // Fallback
    default => 'bg-zinc-900 text-white hover:bg-zinc-800',
};

    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : '';

    // Merge all classes
    $classes = trim("{$baseClasses} {$roundedClasses} {$sizeClasses} {$colorClasses} {$focusRingColor} {$disabledClasses}");

    // Remove padding and border-radius if plain
    if ($plain) {
        $classes = preg_replace('/px-\S+/', 'px-0', $classes);
        $classes = preg_replace('/py-\S+/', 'py-0', $classes);
        $classes = preg_replace('/rounded-\S+/', '', $classes);
    }
@endphp

@if($href)
    <a href="{{ $disabled ? '#' : $href }}"
       {{ $attributes->merge(['class' => $classes]) }}
       @if($disabled) aria-disabled="true" tabindex="-1" @endif
        role="button"
    >
        @if($icon)
            <x-dynamic-component
                :component="$icon"
                :class="$iconSize . ' shrink-0'"
                aria-hidden="true"
            />
        @endif
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $classes]) }}
        @if($disabled) disabled @endif
    >
        @if($icon)
            <x-dynamic-component
                :component="$icon"
                :class="$iconSize . ' shrink-0'"
                aria-hidden="true"
            />
        @endif
        {{ $slot }}
    </button>
@endif
