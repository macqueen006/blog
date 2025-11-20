@props([
    'align' => 'bottom-start',
    'width' => 'max',
])

@php
    // Alignment mapping for fallback (when Floating UI is not available)
    $alignmentClasses = [
        'top-start' => 'bottom-full mb-2 left-0',
        'top-end' => 'bottom-full mb-2 right-0',
        'bottom-start' => 'top-full mt-2 left-0',
        'bottom-end' => 'top-full mt-2 right-0',
        'left-start' => 'right-full mr-2 top-0',
        'right-start' => 'left-full ml-2 top-0',
    ];

    $positionClass = $alignmentClasses[$align] ?? $alignmentClasses['bottom-start'];
    $widthClass = $width === 'max' ? 'w-max' : ($width === 'full' ? 'w-full' : 'w-' . $width);
@endphp

<div x-data="{
    open: false,
    placement: '{{ $align }}',
    cleanup: null,
    init() {
        // Initialize Floating UI if available
        if (window.FloatingUIDOM) {
            this.$watch('open', value => {
                if (value) {
                    this.updatePosition();
                } else {
                    // Clean up when dropdown closes
                    if (this.cleanup) {
                        this.cleanup();
                        this.cleanup = null;
                    }
                }
            });
        }
    },
    updatePosition() {
        const reference = this.$refs.trigger;
        const floating = this.$refs.dropdown;

        if (!reference || !floating || !window.FloatingUIDOM) return;

        const { computePosition, flip, shift, offset } = window.FloatingUIDOM;

        // Get placement from align prop
        const placement = this.placement;

        // Auto-update position
        this.cleanup = window.FloatingUIDOM.autoUpdate(reference, floating, () => {
            computePosition(reference, floating, {
                placement: placement,
                middleware: [
                    offset(8), // 8px gap (equivalent to mt-2/mb-2)
                    flip({
                        fallbackAxisSideDirection: 'start',
                        padding: 8,
                    }),
                    shift({ padding: 8 }),
                ],
            }).then(({ x, y, placement: finalPlacement }) => {
                Object.assign(floating.style, {
                    left: `${x}px`,
                    top: `${y}px`,
                    });
                });
            });
        }
     }"
     @click.away="open = false"
     @keydown.escape.window="open = false"
     x-on:destroy="cleanup && cleanup()"
     class="relative w-fit">
    <div x-ref="trigger">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-ref="dropdown"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false"
         style="display: none;"
         class="fixed z-50 rounded-md p-1 outline outline-transparent focus:outline-hidden overflow-y-auto bg-white/75 backdrop-blur-xl dark:bg-zinc-800/75 shadow-lg ring-1 ring-zinc-950/10 dark:ring-white/10 dark:ring-inset {{ $widthClass }}">
        <div class="flex flex-col max-h-[243px] overflow-y-scroll" role="menu">
            {{ $slot }}
        </div>
    </div>
</div>
