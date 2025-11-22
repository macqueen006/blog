@props([
    'disabled' => false,
])

<div
    data-slot="field"
    {{ $attributes->merge(['class' => 'grid grid-cols-[1.125rem_1fr] gap-x-4 gap-y-1 sm:grid-cols-[1rem_1fr] *:data-[slot=control]:col-start-1 *:data-[slot=control]:row-start-1 *:data-[slot=control]:mt-0.75 sm:*:data-[slot=control]:mt-1 *:data-[slot=label]:col-start-2 *:data-[slot=label]:row-start-1 *:data-[slot=description]:col-start-2 *:data-[slot=description]:row-start-2 has-data-[slot=description]:**:data-[slot=label]:font-medium']) }}
    x-data="{ disabled: {{ $disabled ? 'true' : 'false' }} }"
>
    {{ $slot }}
</div>
