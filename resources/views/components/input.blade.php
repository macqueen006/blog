@props([
    'type' => 'text',
    'name' => null,
    'disabled' => false,
])

<span class="relative block w-full before:absolute before:inset-px before:rounded-[calc(theme(borderRadius.lg)-1px)] before:bg-white before:shadow-sm dark:before:hidden after:pointer-events-none after:absolute after:inset-0 after:rounded-sm after:ring-transparent after:ring-inset sm:focus-within:after:ring-2 sm:focus-within:after:ring-blue-500 has-[:disabled]:opacity-50 has-[:disabled]:before:bg-zinc-950/5 has-[:disabled]:before:shadow-none">
    <input
        type="{{ $type }}"
        @if($name) name="{{ $name }}" @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'relative block w-full appearance-none rounded-sm px-[calc(theme(spacing.3)-1px)] py-[calc(theme(spacing.2)-3px)] text-base/6 text-zinc-950 placeholder:text-zinc-500 sm:text-sm/6 dark:text-white border border-zinc-950/10 hover:border-zinc-950/20 dark:border-white/10 dark:hover:border-white/20 bg-transparent dark:bg-white/5 focus:outline-none invalid:border-red-500 invalid:hover:border-red-500 dark:invalid:border-red-600 dark:invalid:hover:border-red-600 disabled:border-zinc-950/20 dark:disabled:border-white/15 dark:disabled:bg-white/[0.025] dark:hover:disabled:border-white/15']) }}
    />
</span>
