<div data-error
    {{ $attributes->merge(['class' => 'text-sm/6 text-red-600 disabled:opacity-50 dark:text-red-500']) }}
>
    {{ $slot }}
</div>
