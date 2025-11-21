@props([
    'ariaLabel' => 'Page navigation',
])

<nav aria-label="{{ $ariaLabel }}" {{ $attributes->merge(['class' => 'flex gap-x-2']) }}>
    {{ $slot }}
</nav>
