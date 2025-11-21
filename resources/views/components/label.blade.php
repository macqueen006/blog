@props([
    'for' => null
])

<label
    {{ $attributes->merge(['class' => 'select-none text-sm/6 text-zinc-950 disabled:opacity-50 dark:text-white']) }}
    @if($for) for="{{ $for }}" @endif
>
    {{ $slot }}
</label>
