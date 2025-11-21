@props([
    'bleed' => false,
    'dense' => false,
    'grid' => false,
    'striped' => false,
])

<div
    {{ $attributes->class(['flow-root']) }}
    data-table
    @if($bleed) data-bleed @endif
    @if($dense) data-dense @endif
    @if($grid) data-grid @endif
    @if($striped) data-striped @endif
>
    <div class="-mx-(--gutter) overflow-x-auto whitespace-nowrap">
        <div class="inline-block min-w-full align-middle sm:px-(--gutter)">
            <table class="min-w-full text-left text-sm/6 text-zinc-950 dark:text-white">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>
