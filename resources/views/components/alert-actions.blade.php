@props([])

<div {{ $attributes->merge(['class' => 'mt-6 flex flex-col-reverse items-center justify-end gap-3 *:w-full sm:mt-4 sm:flex-row sm:*:w-auto']) }}>
    {{ $slot }}
</div>

