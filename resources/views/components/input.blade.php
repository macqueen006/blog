@props([
    'type' => 'text',
    'name' => null,
    'disabled' => false,
    'id' => null,
    'invalid' => false,
])
@php
    $baseClasses = 'block w-full appearance-none rounded-md px-[calc(0.75rem-1px)] py-[calc(0.375rem-1px)]';

       $textClasses = 'text-sm/6 text-zinc-950 placeholder:text-zinc-500 dark:text-white dark:placeholder:text-zinc-400';

       $borderClasses = $invalid
           ? 'border border-red-500 hover:border-red-600 dark:border-red-600 dark:hover:border-red-700'
           : 'border border-zinc-950/10 hover:border-zinc-950/20 dark:border-white/10 dark:hover:border-white/20';

       $bgClasses = 'bg-transparent dark:bg-white/5';

       $focusClasses = $invalid
           ? 'focus:outline-none focus:outline focus:outline focus:outline-offset focus:outline-red-500'
           : 'focus:outline-none focus:outline focus:outline focus:outline-offset focus:outline-blue-500';

       $disabledClasses = 'disabled:opacity-60 disabled:cursor-not-allowed disabled:bg-zinc-100 dark:disabled:bg-zinc-900 disabled:text-zinc-500 dark:disabled:text-zinc-500 disabled:border-zinc-200 dark:disabled:border-zinc-800';

       $allClasses = $baseClasses . ' ' . $textClasses . ' ' . $borderClasses . ' ' . $bgClasses . ' ' . $focusClasses . ' ' . $disabledClasses;
@endphp

<span
    class="relative block w-full before:absolute before:inset-px before:rounded-md before:bg-white before:shadow-sm dark:before:hidden after:pointer-events-none after:absolute after:inset-0 after:rounded-sm after:ring-transparent after:ring-inset sm:focus-within:after:ring {{ $invalid ? 'focus-within:after:ring focus-within:after:ring-red-500' : 'focus-within:after:ring focus-within:after:ring-blue-500' }}">
    <input
        type="{{ $type }}"
        @if($name) name="{{ $name }}" @endif
        @if($disabled) disabled title="Field currently disabled" @endif
        {{ $attributes->merge(['class' => $allClasses]) }}
        @if($id) id="{{ $id }}" @endif
    />
</span>
