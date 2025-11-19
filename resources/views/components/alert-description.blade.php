@props([])

<p {{ $attributes->merge(['class' => 'mt-2 text-center text-pretty sm:text-left text-base/6 text-zinc-500 sm:text-sm/6 dark:text-zinc-400']) }}>
    {{ $slot }}
</p>
