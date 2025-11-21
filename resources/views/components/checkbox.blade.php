@props([
    'name' => null,
    'value' => 'on',
    'checked' => false,
    'disabled' => false,
    'color' => 'dark/zinc',
    'indeterminate' => false,
])

@php
    $colorMap = [
        'dark/zinc' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-zinc-900)] [--checkbox-checked-border:var(--color-zinc-950)]/90 dark:[--checkbox-checked-bg:var(--color-zinc-600)]',
        'dark/white' => '[--checkbox-check:var(--color-zinc-900)] [--checkbox-checked-bg:var(--color-white)] [--checkbox-checked-border:var(--color-zinc-950)]/15 dark:[--checkbox-check:var(--color-white)] dark:[--checkbox-checked-bg:var(--color-zinc-900)] dark:[--checkbox-checked-border:var(--color-white)]/15',
        'dark' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-zinc-900)] [--checkbox-checked-border:var(--color-zinc-950)]/90',
        'zinc' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-zinc-600)] [--checkbox-checked-border:var(--color-zinc-700)]/90',
        'white' => '[--checkbox-check:var(--color-zinc-900)] [--checkbox-checked-bg:var(--color-white)] [--checkbox-checked-border:var(--color-zinc-950)]/15',
        'red' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-red-600)] [--checkbox-checked-border:var(--color-red-700)]/90',
        'orange' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-orange-500)] [--checkbox-checked-border:var(--color-orange-600)]/90',
        'amber' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-amber-400)] [--checkbox-checked-border:var(--color-amber-500)]/80',
        'yellow' => '[--checkbox-check:var(--color-zinc-900)] [--checkbox-checked-bg:var(--color-yellow-300)] [--checkbox-checked-border:var(--color-yellow-400)]/80',
        'lime' => '[--checkbox-check:var(--color-zinc-900)] [--checkbox-checked-bg:var(--color-lime-300)] [--checkbox-checked-border:var(--color-lime-400)]/80',
        'green' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-green-600)] [--checkbox-checked-border:var(--color-green-700)]/90',
        'emerald' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-emerald-600)] [--checkbox-checked-border:var(--color-emerald-700)]/90',
        'teal' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-teal-600)] [--checkbox-checked-border:var(--color-teal-700)]/90',
        'cyan' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-cyan-500)] [--checkbox-checked-border:var(--color-cyan-600)]/90',
        'sky' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-sky-500)] [--checkbox-checked-border:var(--color-sky-600)]/80',
        'blue' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-blue-600)] [--checkbox-checked-border:var(--color-blue-700)]/90',
        'indigo' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-indigo-600)] [--checkbox-checked-border:var(--color-indigo-700)]/90',
        'violet' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-violet-600)] [--checkbox-checked-border:var(--color-violet-700)]/90',
        'purple' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-purple-600)] [--checkbox-checked-border:var(--color-purple-700)]/90',
        'fuchsia' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-fuchsia-600)] [--checkbox-checked-border:var(--color-fuchsia-700)]/90',
        'pink' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-pink-600)] [--checkbox-checked-border:var(--color-pink-700)]/90',
        'rose' => '[--checkbox-check:var(--color-white)] [--checkbox-checked-bg:var(--color-rose-600)] [--checkbox-checked-border:var(--color-rose-700)]/90',
    ];

    $colorClasses = $colorMap[$color] ?? $colorMap['dark/zinc'];
@endphp

<span
    data-slot="control"
    {{ $attributes->merge(['class' => 'group inline-flex focus:outline-hidden']) }}
    x-data="{
        checked: {{ $checked ? 'true' : 'false' }},
        indeterminate: {{ $indeterminate ? 'true' : 'false' }},
        disabled: {{ $disabled ? 'true' : 'false' }},
        focused: false,
        hover: false,
        toggle() {
            if (!this.disabled) {
                this.checked = !this.checked;
                this.indeterminate = false;
            }
        }
    }"
    @click="toggle()"
    @keydown.space.prevent="toggle()"
    @focus="focused = true"
    @blur="focused = false"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    role="checkbox"
    :aria-checked="indeterminate ? 'mixed' : (checked ? 'true' : 'false')"
    :tabindex="disabled ? '-1' : '0'"
    :data-checked="checked ? '' : undefined"
    :data-indeterminate="indeterminate ? '' : undefined"
    :data-disabled="disabled ? '' : undefined"
    :data-focus="focused ? '' : undefined"
    :data-hover="hover && !disabled ? '' : undefined"
>
    <span class="relative isolate flex size-4.5 items-center justify-center rounded-[0.3125rem] sm:size-4 before:absolute before:inset-0 before:-z-10 before:rounded-[calc(0.3125rem-1px)] before:bg-white before:shadow-sm group-data-checked:before:bg-(--checkbox-checked-bg) dark:before:hidden dark:bg-white/5 dark:group-data-checked:bg-(--checkbox-checked-bg) border border-zinc-950/15 group-data-checked:border-transparent group-data-hover:group-data-checked:border-transparent group-data-hover:border-zinc-950/30 group-data-checked:bg-(--checkbox-checked-border) dark:border-white/15 dark:group-data-checked:border-white/5 dark:group-data-hover:group-data-checked:border-white/5 dark:group-data-hover:border-white/30 after:absolute after:inset-0 after:rounded-[calc(0.3125rem-1px)] after:shadow-[inset_0_1px_--theme(--color-white/15%)] dark:after:-inset-px dark:after:hidden dark:after:rounded-[0.3125rem] dark:group-data-checked:after:block group-data-focus:outline-2 group-data-focus:outline-offset-2 group-data-focus:outline-(--checkbox-checked-bg) group-data-disabled:opacity-50 group-data-disabled:border-zinc-950/25 group-data-disabled:bg-zinc-950/5 group-data-disabled:[--checkbox-check:var(--color-zinc-950)]/50 group-data-disabled:before:bg-transparent dark:group-data-disabled:border-white/20 dark:group-data-disabled:bg-white/2.5 dark:group-data-disabled:[--checkbox-check:var(--color-white)]/50 dark:group-data-checked:group-data-disabled:after:hidden forced-colors:[--checkbox-check:HighlightText] forced-colors:[--checkbox-checked-bg:Highlight] forced-colors:group-data-disabled:[--checkbox-check:Highlight] dark:forced-colors:[--checkbox-check:HighlightText] dark:forced-colors:[--checkbox-checked-bg:Highlight] dark:forced-colors:group-data-disabled:[--checkbox-check:Highlight] {{ $colorClasses }}">
        <svg class="size-4 stroke-(--checkbox-check) opacity-0 group-data-checked:opacity-100 sm:h-3.5 sm:w-3.5" viewBox="0 0 14 14" fill="none">
            <path class="opacity-100 group-data-indeterminate:opacity-0" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path class="opacity-0 group-data-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </span>

    {{-- Hidden input for form submission --}}
    <input
        type="checkbox"
        @if($name) name="{{ $name }}" @endif
        @if($value) value="{{ $value }}" @endif
        @if($disabled) disabled @endif
        x-model="checked"
        class="sr-only"
        tabindex="-1"
    />
</span>
