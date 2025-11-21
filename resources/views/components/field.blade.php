@props([
    'disabled' => false,
])

@php
    $fieldId = 'field-' . uniqid();
@endphp

<div {{ $attributes->merge(['class' => '']) }}
    x-data="field('{{ $fieldId }}', {{ $disabled ? 'true' : 'false' }})"
>
    {{ $slot }}
</div>
