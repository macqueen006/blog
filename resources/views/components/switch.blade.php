@props([
    'name' => null,
    'value' => 'on',
    'checked' => false,
    'disabled' => false,
    'color' => 'dark/zinc',
])

@php
    $colorMap = [
        'dark/zinc' => '[--switch-bg-ring:var(--color-zinc-950)]/90 [--switch-bg:var(--color-zinc-900)] dark:[--switch-bg-ring:transparent] dark:[--switch-bg:var(--color-white)]/25 [--switch-ring:var(--color-zinc-950)]/90 [--switch-shadow:var(--color-black)]/10 [--switch:white] dark:[--switch-ring:var(--color-zinc-700)]/90',
        'dark/white' => '[--switch-bg-ring:var(--color-zinc-950)]/15 [--switch-bg:var(--color-white)] dark:[--switch-bg-ring:var(--color-white)]/15 dark:[--switch-bg:var(--color-zinc-900)] [--switch-ring:var(--color-zinc-950)]/90 [--switch-shadow:var(--color-black)]/10 [--switch:var(--color-zinc-950)] dark:[--switch-ring:var(--color-white)]/90 dark:[--switch:white]',
        'dark' => '[--switch-bg-ring:var(--color-zinc-950)]/90 [--switch-bg:var(--color-zinc-900)] [--switch-ring:var(--color-zinc-950)]/90 [--switch-shadow:var(--color-black)]/10 [--switch:white]',
        'zinc' => '[--switch-bg-ring:var(--color-zinc-700)]/90 [--switch-bg:var(--color-zinc-600)] [--switch-ring:var(--color-zinc-700)]/90 [--switch-shadow:var(--color-black)]/10 [--switch:white]',
        'white' => '[--switch-bg-ring:var(--color-zinc-950)]/15 [--switch-bg:var(--color-white)] [--switch-ring:var(--color-zinc-950)]/90 [--switch-shadow:var(--color-black)]/10 [--switch:var(--color-zinc-950)]',
        'red' => '[--switch-bg-ring:var(--color-red-700)]/90 [--switch-bg:var(--color-red-600)] [--switch-ring:var(--color-red-950)]/50 [--switch-shadow:var(--color-red-950)]/50 [--switch:white]',
        'orange' => '[--switch-bg-ring:var(--color-orange-600)]/90 [--switch-bg:var(--color-orange-500)] [--switch-ring:var(--color-orange-950)]/50 [--switch-shadow:var(--color-orange-950)]/50 [--switch:white]',
        'amber' => '[--switch-bg-ring:var(--color-amber-500)]/80 [--switch-bg:var(--color-amber-400)] [--switch-ring:var(--color-amber-950)]/50 [--switch-shadow:var(--color-amber-950)]/50 [--switch:white]',
        'yellow' => '[--switch-bg-ring:var(--color-yellow-400)]/80 [--switch-bg:var(--color-yellow-300)] [--switch-ring:var(--color-amber-950)]/50 [--switch-shadow:var(--color-amber-950)]/50 [--switch:var(--color-amber-950)]',
        'lime' => '[--switch-bg-ring:var(--color-lime-400)]/80 [--switch-bg:var(--color-lime-300)] [--switch-ring:var(--color-lime-950)]/50 [--switch-shadow:var(--color-lime-950)]/50 [--switch:var(--color-lime-950)]',
        'green' => '[--switch-bg-ring:var(--color-green-700)]/90 [--switch-bg:var(--color-green-600)] [--switch-ring:var(--color-green-950)]/40 [--switch-shadow:var(--color-green-950)]/50 [--switch:white]',
        'emerald' => '[--switch-bg-ring:var(--color-emerald-700)]/90 [--switch-bg:var(--color-emerald-600)] [--switch-ring:var(--color-emerald-950)]/40 [--switch-shadow:var(--color-emerald-950)]/50 [--switch:white]',
        'teal' => '[--switch-bg-ring:var(--color-teal-700)]/90 [--switch-bg:var(--color-teal-600)] [--switch-ring:var(--color-teal-950)]/40 [--switch-shadow:var(--color-teal-950)]/50 [--switch:white]',
        'cyan' => '[--switch-bg-ring:var(--color-cyan-600)]/90 [--switch-bg:var(--color-cyan-500)] [--switch-ring:var(--color-cyan-950)]/50 [--switch-shadow:var(--color-cyan-950)]/50 [--switch:white]',
        'sky' => '[--switch-bg-ring:var(--color-sky-600)]/80 [--switch-bg:var(--color-sky-500)] [--switch-ring:var(--color-sky-950)]/50 [--switch-shadow:var(--color-sky-950)]/50 [--switch:white]',
        'blue' => '[--switch-bg-ring:var(--color-blue-700)]/90 [--switch-bg:var(--color-blue-600)] [--switch-ring:var(--color-blue-950)]/50 [--switch-shadow:var(--color-blue-950)]/50 [--switch:white]',
        'indigo' => '[--switch-bg-ring:var(--color-indigo-700)]/90 [--switch-bg:var(--color-indigo-600)] [--switch-ring:var(--color-indigo-950)]/30 [--switch-shadow:var(--color-indigo-950)]/50 [--switch:white]',
        'violet' => '[--switch-bg-ring:var(--color-violet-700)]/90 [--switch-bg:var(--color-violet-600)] [--switch-ring:var(--color-violet-950)]/30 [--switch-shadow:var(--color-violet-950)]/50 [--switch:white]',
        'purple' => '[--switch-bg-ring:var(--color-purple-700)]/90 [--switch-bg:var(--color-purple-600)] [--switch-ring:var(--color-purple-950)]/30 [--switch-shadow:var(--color-purple-950)]/50 [--switch:white]',
        'fuchsia' => '[--switch-bg-ring:var(--color-fuchsia-700)]/90 [--switch-bg:var(--color-fuchsia-600)] [--switch-ring:var(--color-fuchsia-950)]/30 [--switch-shadow:var(--color-fuchsia-950)]/50 [--switch:white]',
        'pink' => '[--switch-bg-ring:var(--color-pink-700)]/90 [--switch-bg:var(--color-pink-600)] [--switch-ring:var(--color-pink-950)]/30 [--switch-shadow:var(--color-pink-950)]/50 [--switch:white]',
        'rose' => '[--switch-bg-ring:var(--color-rose-700)]/90 [--switch-bg:var(--color-rose-600)] [--switch-ring:var(--color-rose-950)]/30 [--switch-shadow:var(--color-rose-950)]/50 [--switch:white]',
    ];

    $colorClasses = $colorMap[$color] ?? $colorMap['dark/zinc'];
    $uniqueId = 'switch-' . uniqid();
@endphp

<button
    data-slot="control"
    type="button"
    {{ $attributes->merge(['class' => 'group relative isolate inline-flex h-6 w-10 cursor-pointer rounded-full p-[3px] sm:h-5 sm:w-8 transition duration-0 ease-in-out data-changing:duration-200 forced-colors:outline forced-colors:[--switch-bg:Highlight] dark:forced-colors:[--switch-bg:Highlight] bg-zinc-200 ring-1 ring-black/5 ring-inset dark:bg-white/5 dark:ring-white/15 data-checked:bg-(--switch-bg) data-checked:ring-(--switch-bg-ring) dark:data-checked:bg-(--switch-bg) dark:data-checked:ring-(--switch-bg-ring) focus:outline-hidden data-focus:outline-2 data-focus:outline-offset-2 data-focus:outline-blue-500 data-hover:ring-black/15 data-hover:data-checked:ring-(--switch-bg-ring) dark:data-hover:ring-white/25 dark:data-hover:data-checked:ring-(--switch-bg-ring) data-disabled:bg-zinc-200 data-disabled:opacity-50 data-disabled:cursor-not-allowed data-disabled:data-checked:bg-zinc-200 data-disabled:data-checked:ring-black/5 dark:data-disabled:bg-white/15 dark:data-disabled:data-checked:bg-white/15 dark:data-disabled:data-checked:ring-white/15 ' . $colorClasses]) }}
    x-data="{
        checked: {{ $checked ? 'true' : 'false' }},
        disabled: {{ $disabled ? 'true' : 'false' }},
        focused: false,
        hover: false,
        changing: false
    }"
    @click="if (!disabled) {
        changing = true;
        checked = !checked;
        $refs.hiddenInput.checked = checked;
        setTimeout(() => changing = false, 200);
    }"
    @focus="focused = true"
    @blur="focused = false"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    :aria-checked="checked ? 'true' : 'false'"
    :disabled="disabled"
    :data-checked="checked ? '' : undefined"
    :data-disabled="disabled ? '' : undefined"
    :data-focus="focused ? '' : undefined"
    :data-hover="hover && !disabled ? '' : undefined"
    :data-changing="changing ? '' : undefined"
    role="switch"
>
    <span
        aria-hidden="true"
        class="pointer-events-none relative inline-block size-4.5 rounded-full sm:size-3.5 translate-x-0 transition duration-200 ease-in-out border border-transparent bg-white shadow-sm ring-1 ring-black/5 group-data-checked:bg-(--switch) group-data-checked:shadow-(--switch-shadow) group-data-checked:ring-(--switch-ring) group-data-checked:translate-x-4 sm:group-data-checked:translate-x-3 group-data-checked:group-data-disabled:bg-white group-data-checked:group-data-disabled:shadow-sm group-data-checked:group-data-disabled:ring-black/5"
    ></span>

    {{-- Hidden checkbox for form submission --}}
    <input
        type="checkbox"
        x-ref="hiddenInput"
        @if($name) name="{{ $name }}" @endif
        @if($value) value="{{ $value }}" @endif
        @if($checked) checked @endif
        @if($disabled) disabled @endif
        class="sr-only"
    />
</button>
