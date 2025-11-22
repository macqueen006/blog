@props([
    'disabled' => false,
])

<div data-slot="field"
    {{ $attributes->merge(['class' => 'grid grid-cols-[1fr_auto] items-center gap-2']) }}
    x-data="{ disabled: {{ $disabled ? 'true' : 'false' }} }"
>
    {{ $slot }}
</div>
