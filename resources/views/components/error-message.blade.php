<div data-error
    {{ $attributes->merge(['class' => 'text-base/6 text-red-600 disabled:opacity-50 sm:text-sm/6 dark:text-red-500']) }}
>
    {{ $slot }}
</div>
