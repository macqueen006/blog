@props([
    'href' => null,
])

<span class="flex grow basis-0 justify-end">
    @if($href)
        <a
            href="{{ $href }}"
            aria-label="Next page"
            {{ $attributes->merge(['class' => 'relative isolate inline-flex items-center justify-center gap-x-2 rounded-lg border text-sm/6 font-semibold px-[11px] py-[5px] focus:outline-none focus:outline-2 focus:outline-offset-2 focus:outline-blue-500 border-transparent text-zinc-950 hover:bg-zinc-950/5 active:bg-zinc-950/5 dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10 [--btn-icon:var(--color-zinc-500)] hover:[--btn-icon:var(--color-zinc-700)] active:[--btn-icon:var(--color-zinc-700)] dark:[--btn-icon:var(--color-zinc-500)] dark:hover:[--btn-icon:var(--color-zinc-400)] dark:active:[--btn-icon:var(--color-zinc-400)]']) }}
        >
            <span class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)] -translate-x-1/2 -translate-y-1/2 pointer-fine:hidden" aria-hidden="true"></span>
            {{ $slot->isEmpty() ? 'Next' : $slot }}
            <svg class="stroke-current -mx-0.5 my-0.5 size-5 shrink-0 sm:my-1 sm:size-4" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M13.25 8L2.75 8M13.25 8L10.75 10.5M13.25 8L10.75 5.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    @else
        <button
            type="button"
            disabled
            aria-label="Next page"
            {{ $attributes->merge(['class' => 'relative isolate inline-flex items-center justify-center gap-x-2 rounded-lg border text-sm/6 font-semibold px-[11px] py-[5px] border-transparent text-zinc-950 dark:text-white opacity-50 cursor-default']) }}
        >
            <span class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)] -translate-x-1/2 -translate-y-1/2 pointer-fine:hidden" aria-hidden="true"></span>
            {{ $slot->isEmpty() ? 'Next' : $slot }}
            <svg class="stroke-current -mx-0.5 my-0.5 size-5 shrink-0 sm:my-1 sm:size-4" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M13.25 8L2.75 8M13.25 8L10.75 10.5M13.25 8L10.75 5.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    @endif
</span>
