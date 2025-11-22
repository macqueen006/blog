@props([
    'name' => null,
    'defaultValue' => null,
    'disabled' => false,
])

<div
    data-slot="control"
    {{ $attributes->merge(['class' => 'space-y-3 **:data-[slot=label]:font-normal has-data-[slot=description]:space-y-6 has-data-[slot=description]:**:data-[slot=label]:font-medium']) }}
    role="radiogroup"
    x-data="{
        name: '{{ $name }}',
        selected: '{{ $defaultValue }}',
        disabled: {{ $disabled ? 'true' : 'false' }}
    }"
>
    {{ $slot }}
</div>
