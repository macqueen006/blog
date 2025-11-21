@props([
    'href',
    'current' => false,
])

<a
    href="{{ $href }}"
    aria-label="Page {{ $slot }}"
    @if($current) aria-current="page" @endif
    {{ $attributes->merge(['class' => 'min-w-9 before:absolute before:-inset-px before:rounded-lg ' . ($current ? 'before:bg-zinc-950/5 dark:before:bg-white/10 ' : '') . 'relative isolate inline-flex items-center justify-center gap-x-2 rounded-lg border text-sm/6 font-semibold px-[11px] py-[5px] focus:outline-none focus:outline-2 focus:outline-offset-2 focus:outline-blue-500 border-transparent text-zinc-950 hover:bg-zinc-950/5 active:bg-zinc-950/5 dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10']) }}
>
    <span class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)] -translate-x-1/2 -translate-y-1/2 pointer-fine:hidden" aria-hidden="true"></span>
    <span class="-mx-0.5">{{ $slot }}</span>
</a>
