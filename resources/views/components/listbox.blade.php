
<div class="-mx-6 flex min-w-[300px] items-start justify-center overflow-hidden border-y border-zinc-200 bg-white sm:mx-0 sm:max-w-full sm:rounded-lg sm:border dark:border-white/10 dark:bg-zinc-900 px-6 py-12 sm:px-8">
    <div class="flex grow items-baseline justify-center gap-6"
         x-data="{
            open: false,
            selected: 'active',
            options: [
                { value: 'active', label: 'Active' },
                { value: 'paused', label: 'Paused' },
                { value: 'delayed', label: 'Delayed' },
                { value: 'canceled', label: 'Canceled' }
            ],
            focusedIndex: -1,
            buttonWidth: 0,
            anchorOffset: 0,
            get selectedLabel() {
                return this.options.find(opt => opt.value === this.selected)?.label || '';
            },
            selectOption(value) {
                this.selected = value;
                this.open = false;
                this.$refs.button.focus();
            },
            handleKeydown(event) {
                if (!this.open && (event.key === 'Enter' || event.key === ' ' || event.key === 'ArrowDown' || event.key === 'ArrowUp')) {
                    event.preventDefault();
                    this.open = true;
                    this.focusedIndex = this.options.findIndex(opt => opt.value === this.selected);
                    if (this.focusedIndex === -1) this.focusedIndex = 0;
                    return;
                }

                if (!this.open) return;

                if (event.key === 'ArrowDown') {
                    event.preventDefault();
                    this.focusedIndex = Math.min(this.focusedIndex + 1, this.options.length - 1);
                } else if (event.key === 'ArrowUp') {
                    event.preventDefault();
                    this.focusedIndex = Math.max(this.focusedIndex - 1, 0);
                } else if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    if (this.focusedIndex >= 0) {
                        this.selectOption(this.options[this.focusedIndex].value);
                    }
                } else if (event.key === 'Escape') {
                    event.preventDefault();
                    this.open = false;
                    this.$refs.button.focus();
                } else if (event.key === 'Home') {
                    event.preventDefault();
                    this.focusedIndex = 0;
                } else if (event.key === 'End') {
                    event.preventDefault();
                    this.focusedIndex = this.options.length - 1;
                }
            },
            calculateOffset() {
                const selectedIndex = this.options.findIndex(opt => opt.value === this.selected);
                if (selectedIndex >= 0) {
                    // Estimate item height: py-2.5 (10px top + 10px bottom) + line-height (~24px base) = ~44px on desktop
                    // For sm screens: py-1.5 (6px top + 6px bottom) + line-height (~20px) = ~32px
                    const itemHeight = window.innerWidth >= 640 ? 32 : 44;
                    const padding = 4; // p-1 = 4px
                    this.anchorOffset = -(padding + (selectedIndex * itemHeight));
                }
            },
            init() {
                this.$watch('open', value => {
                    if (value) {
                        this.buttonWidth = this.$refs.button.offsetWidth;
                        this.focusedIndex = this.options.findIndex(opt => opt.value === this.selected);
                        if (this.focusedIndex === -1) this.focusedIndex = 0;

                        // Calculate offset before opening
                        this.calculateOffset();

                        this.$nextTick(() => {
                            const dropdown = this.$refs.dropdown;
                            if (dropdown) {
                                dropdown.focus();
                            }
                        });
                    }
                });
            }
        }"
         @keydown.escape.window="open = false"
         @click.outside="open = false"
    >
        <label
            data-slot="label"
            class="text-base/6 text-zinc-950 select-none data-disabled:opacity-50 sm:text-sm/6 dark:text-white"
            @click="$refs.button.focus()"
        >
            Project status
        </label>

        <div class="relative max-w-48 w-full">
            <button
                x-ref="button"
                data-slot="control"
                type="button"
                class="group relative block w-full before:absolute before:inset-px before:rounded-[calc(theme(borderRadius.lg)-1px)] before:bg-white before:shadow-sm dark:before:hidden focus:outline-hidden after:pointer-events-none after:absolute after:inset-0 after:rounded-lg after:ring-transparent after:ring-inset focus:after:ring-2 focus:after:ring-blue-500 disabled:opacity-50 disabled:before:bg-zinc-950/5 disabled:before:shadow-none"
                aria-haspopup="listbox"
                :aria-expanded="open"
                @click="open = !open"
                @keydown="handleKeydown"
            >
                <span
                    class="relative block w-full appearance-none rounded-lg py-[calc(theme(spacing[2.5])-1px)] sm:py-[calc(theme(spacing[1.5])-1px)] min-h-11 sm:min-h-9 pr-[calc(theme(spacing.7)-1px)] pl-[calc(theme(spacing[3.5])-1px)] sm:pl-[calc(theme(spacing.3)-1px)] text-left text-base/6 text-zinc-950 placeholder:text-zinc-500 sm:text-sm/6 dark:text-white border border-zinc-950/10 group-hover:border-zinc-950/20 dark:border-white/10 dark:group-hover:border-white/20 bg-transparent dark:bg-white/5 group-disabled:border-zinc-950/20 group-disabled:opacity-100 dark:group-disabled:border-white/15 dark:group-disabled:bg-white/2.5">
                    <div class="flex min-w-0 items-center">
                        <span class="ml-2.5 truncate first:ml-0 sm:ml-2 sm:first:ml-0" x-text="selectedLabel"></span>
                    </div>
                </span>

                <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                    <svg class="size-5 stroke-zinc-500 group-disabled:stroke-zinc-600 sm:size-4 dark:stroke-zinc-400"
                         viewBox="0 0 16 16" aria-hidden="true" fill="none">
                        <path d="M5.75 10.75L8 13L10.25 10.75" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M10.25 5.25L8 3L5.75 5.25" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </span>
            </button>

            {{-- Dropdown Options Portal --}}
            <template x-teleport="body">
                <div
                    x-show="open"
                    x-ref="dropdown"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="isolate scroll-py-1 rounded-xl p-1 select-none outline-hidden overflow-y-auto overscroll-contain bg-white/75 backdrop-blur-xl dark:bg-zinc-800/75 shadow-lg ring-1 ring-zinc-950/10 dark:ring-white/10 dark:ring-inset"
                    x-anchor.top-start.offset.-40="$refs.button"
                    :style="`position: fixed; min-width: calc(${buttonWidth}px + 1.75rem); max-height: min(262px, 100vh); width: max-content; transform: translateY(${anchorOffset}px);`"
                    role="listbox"
                    tabindex="0"
                    @keydown="handleKeydown"
                    x-cloak
                >
                    <template x-for="(option, index) in options" :key="option.value">
                        <div
                            @click="selectOption(option.value)"
                            @mouseenter="focusedIndex = index"
                            :class="{
                                'bg-blue-500 text-white': focusedIndex === index,
                                'text-zinc-950 dark:text-white': focusedIndex !== index
                            }"
                            class="group/option grid cursor-default grid-cols-[theme(spacing.5)_1fr] items-baseline gap-x-2 rounded-lg py-2.5 pr-3.5 pl-2 sm:grid-cols-[theme(spacing.4)_1fr] sm:py-1.5 sm:pr-3 sm:pl-1.5 text-base/6 sm:text-sm/6 outline-hidden"
                            :data-selected="selected === option.value"
                            role="option"
                            :aria-selected="selected === option.value"
                        >
                            <svg
                                x-show="selected === option.value"
                                class="relative size-5 self-center stroke-current sm:size-4"
                                viewBox="0 0 16 16"
                                fill="none"
                                aria-hidden="true"
                            >
                                <path d="M4 8.5l3 3L12 4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span
                                x-show="selected !== option.value"
                                class="relative size-5 sm:size-4"
                            ></span>

                            <span class="flex min-w-0 items-center col-start-2">
                                <span class="ml-2.5 truncate first:ml-0 sm:ml-2 sm:first:ml-0" x-text="option.label"></span>
                            </span>
                        </div>
                    </template>
                </div>
            </template>
        </div>

        <input type="hidden" name="status" :value="selected">
    </div>
</div>
