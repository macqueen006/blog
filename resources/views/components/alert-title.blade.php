@props([])

<h2 {{ $attributes->merge(['class' => 'text-center text-base/6 font-semibold text-balance text-zinc-950 sm:text-left sm:text-sm/6 sm:text-wrap dark:text-white']) }}>
    {{ $slot }}
</h2>
