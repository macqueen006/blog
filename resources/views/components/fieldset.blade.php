@props([
    'disabled' => false,
])

<fieldset {{ $attributes->merge(['class' => '']) }} @if($disabled) disabled @endif>
    {{ $slot }}
</fieldset>
