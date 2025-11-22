@props([
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'color' => 'dark/zinc',
    'indeterminate' => false,
])

@php
    $colorMap = [
        'dark/zinc' => '[--radio-checked-bg:var(--color-zinc-900)] [--radio-checked-border:var(--color-zinc-950)]/90 [--radio-checked-indicator:var(--color-white)] dark:[--radio-checked-bg:var(--color-zinc-600)]',
        'dark/white' => '[--radio-checked-bg:var(--color-white)] [--radio-checked-border:var(--color-zinc-950)]/15 [--radio-checked-indicator:var(--color-zinc-900)] dark:[--radio-checked-bg:var(--color-zinc-900)] dark:[--radio-checked-border:var(--color-white)]/15 dark:[--radio-checked-indicator:var(--color-white)]',
        'dark' => '[--radio-checked-bg:var(--color-zinc-900)] [--radio-checked-border:var(--color-zinc-950)]/90 [--radio-checked-indicator:var(--color-white)]',
        'zinc' => '[--radio-checked-bg:var(--color-zinc-600)] [--radio-checked-border:var(--color-zinc-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'white' => '[--radio-checked-bg:var(--color-white)] [--radio-checked-border:var(--color-zinc-950)]/15 [--radio-checked-indicator:var(--color-zinc-900)]',
        'red' => '[--radio-checked-bg:var(--color-red-600)] [--radio-checked-border:var(--color-red-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'orange' => '[--radio-checked-bg:var(--color-orange-500)] [--radio-checked-border:var(--color-orange-600)]/90 [--radio-checked-indicator:var(--color-white)]',
        'amber' => '[--radio-checked-bg:var(--color-amber-400)] [--radio-checked-border:var(--color-amber-500)]/80 [--radio-checked-indicator:var(--color-white)]',
        'yellow' => '[--radio-checked-bg:var(--color-yellow-300)] [--radio-checked-border:var(--color-yellow-400)]/80 [--radio-checked-indicator:var(--color-zinc-900)]',
        'lime' => '[--radio-checked-bg:var(--color-lime-300)] [--radio-checked-border:var(--color-lime-400)]/80 [--radio-checked-indicator:var(--color-zinc-900)]',
        'green' => '[--radio-checked-bg:var(--color-green-600)] [--radio-checked-border:var(--color-green-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'emerald' => '[--radio-checked-bg:var(--color-emerald-600)] [--radio-checked-border:var(--color-emerald-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'teal' => '[--radio-checked-bg:var(--color-teal-600)] [--radio-checked-border:var(--color-teal-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'cyan' => '[--radio-checked-bg:var(--color-cyan-500)] [--radio-checked-border:var(--color-cyan-600)]/90 [--radio-checked-indicator:var(--color-white)]',
        'sky' => '[--radio-checked-bg:var(--color-sky-500)] [--radio-checked-border:var(--color-sky-600)]/80 [--radio-checked-indicator:var(--color-white)]',
        'blue' => '[--radio-checked-bg:var(--color-blue-600)] [--radio-checked-border:var(--color-blue-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'indigo' => '[--radio-checked-bg:var(--color-indigo-600)] [--radio-checked-border:var(--color-indigo-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'violet' => '[--radio-checked-bg:var(--color-violet-600)] [--radio-checked-border:var(--color-violet-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'purple' => '[--radio-checked-bg:var(--color-purple-600)] [--radio-checked-border:var(--color-purple-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'fuchsia' => '[--radio-checked-bg:var(--color-fuchsia-600)] [--radio-checked-border:var(--color-fuchsia-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'pink' => '[--radio-checked-bg:var(--color-pink-600)] [--radio-checked-border:var(--color-pink-700)]/90 [--radio-checked-indicator:var(--color-white)]',
        'rose' => '[--radio-checked-bg:var(--color-rose-600)] [--radio-checked-border:var(--color-rose-700)]/90 [--radio-checked-indicator:var(--color-white)]',
    ];

    $colorClasses = $colorMap[$color] ?? $colorMap['dark/zinc'];
    $uniqueId = 'radio-' . uniqid();
@endphp

<label
    data-slot="control"
    {{ $attributes->merge(['class' => 'group inline-flex cursor-pointer']) }}
    x-data="{
        checked: {{ $checked ? 'true' : 'false' }},
        disabled: {{ $disabled ? 'true' : 'false' }},
        focused: false,
        hover: false
    }"
    @click.prevent="if (!disabled) {
        checked = !checked;
        $refs.radioInput.checked = checked;
    }"
    @keydown.space.prevent="if (!disabled) {
        checked = !checked;
        $refs.radioInput.checked = checked;
    }"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    :data-checked="checked ? '' : undefined"
    :data-disabled="disabled ? '' : undefined"
    :data-focus="focused ? '' : undefined"
    :data-hover="hover && !disabled ? '' : undefined"
>
    <span class="relative isolate flex size-4.5 items-center justify-center rounded-full sm:size-4 before:absolute before:inset-0 before:-z-10 before:rounded-full before:bg-white before:shadow-sm group-data-checked:before:bg-(--radio-checked-bg) dark:before:hidden dark:bg-white/5 dark:group-data-checked:bg-(--radio-checked-bg) border border-zinc-950/15 group-data-checked:border-transparent group-data-hover:group-data-checked:border-transparent group-data-hover:border-zinc-950/30 group-data-checked:bg-(--radio-checked-border) dark:border-white/15 dark:group-data-checked:border-white/5 dark:group-data-hover:group-data-checked:border-white/5 dark:group-data-hover:border-white/30 after:absolute after:inset-0 after:rounded-full after:shadow-[inset_0_1px_theme(colors.white/15%)] dark:after:-inset-px dark:after:hidden dark:group-data-checked:after:block group-data-focus:outline-2 group-data-focus:outline-offset-2 group-data-focus:outline-blue-500 group-data-disabled:opacity-50 group-data-disabled:border-zinc-950/25 group-data-disabled:bg-zinc-950/5 group-data-disabled:before:bg-transparent dark:group-data-disabled:border-white/20 dark:group-data-disabled:bg-white/2.5 {{ $colorClasses }}">
        <span class="size-1.5 rounded-full bg-(--radio-checked-indicator) opacity-0 group-data-checked:opacity-100"></span>
    </span>

    {{-- Hidden radio input --}}
    <input
        type="radio"
        id="{{ $uniqueId }}"
        x-ref="radioInput"
        @if($name) name="{{ $name }}" @endif
        @if($value) value="{{ $value }}" @endif
        @if($checked) checked @endif
        @if($disabled) disabled @endif
        @focus="focused = true"
        @blur="focused = false"
        class="sr-only"
    />
</label>
