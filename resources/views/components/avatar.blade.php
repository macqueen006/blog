@props([
    'src' => null,
    'initials' => null,
    'square' => false,
    'href' => null,
    'alt' => null
])

@php
    $baseClasses = 'inline-grid shrink-0 align-middle';
    $shapeClasses = $square
        ? 'outline outline-1 -outline-offset-1 outline-black dark:outline-white rounded-md'
        : 'rounded-full outline outline-1 -outline-offset-1 outline-black dark:outline-white';

    $imageClasses = $square ? 'rounded-md' : 'rounded-full';

    $initialsClasses = 'select-none flex items-center justify-center font-medium uppercase';

    $isButton = $href !== null;
@endphp

@if($isButton)
    {{-- Avatar Button/Link --}}
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $baseClasses . ' ' . $shapeClasses . ' focus:outline-none data-[focus]:outline data-[focus]:outline-2 data-[focus]:outline-offset-2 data-[focus]:outline-blue-500']) }}
        x-data="{ focused: false }"
        @focus="focused = true"
        @blur="focused = false"
        :data-focus="focused ? '' : undefined"
    >
        @if($src)
            <img
                class="{{ $imageClasses }} size-full"
                src="{{ $src }}"
                alt="{{ $alt }}"
                @if($initials)
                    x-data="{ loaded: false }"
                @load="loaded = true"
                x-show="loaded"
                @endif
            />
        @endif

        @if($initials)
            <span
                class="{{ $imageClasses }} {{ $initialsClasses }} size-full"
                aria-hidden="{{ $src ? 'true' : 'false' }}"
                @if($src)
                    x-data="{ loaded: false }"
                x-show="!loaded"
                @endif
            >
                {{ $initials }}
            </span>
        @endif
    </a>
@else
    {{-- Regular Avatar --}}
    <span {{ $attributes->merge(['class' => $baseClasses . ' ' . $shapeClasses]) }}>
        @if($src)
            <img
                class="{{ $imageClasses }} size-full"
                src="{{ $src }}"
                alt="{{ $alt }}"
                @if($initials)
                    x-data="{ loaded: false }"
                @load="loaded = true"
                x-show="loaded"
                @endif
            />
        @endif

        @if($initials)
            <span
                class="{{ $imageClasses }} {{ $initialsClasses }} size-full"
                aria-hidden="{{ $src ? 'true' : 'false' }}"
                @if($src)
                    x-data="{ loaded: false }"
                x-show="!loaded"
                @endif
            >
                {{ $initials }}
            </span>
        @endif
    </span>
@endif
