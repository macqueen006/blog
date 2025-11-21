<div>
    {{-- Simple avatars --}}
    <x-avatar class="size-6" src="{{ $user->avatar_url }}" />
    <x-avatar class="size-8" src="{{ $user->avatar_url }}" />
    <x-avatar class="size-10" src="{{ $user->avatar_url }}" />

    <x-avatar
        initials="TW"
        class="size-8 bg-zinc-900 text-white dark:bg-white dark:text-black"
    />

    <x-avatar
        src="{{ $user->avatar_url }}"
        initials="{{ $user->initials }}"
        class="size-8 bg-purple-500 text-white"
    />

    <x-avatar square class="size-8" src="{{ $user->avatar_url }}" />
    <x-avatar square initials="TW" class="size-8 bg-zinc-900 text-white" />

    <div class="flex items-center justify-center -space-x-2">
        @foreach($users as $user)
            <x-avatar
                src="{{ $user->avatar_url }}"
                class="size-8 ring-2 ring-white dark:ring-zinc-900"
            />
        @endforeach
    </div>

    <x-avatar
        href="{{ route('/') }}"
        class="size-8"
        src="{{ $user->avatar_url }}"
    />

    <x-dropdown>
        <x-slot:trigger>
            <x-dropdown-button outline>
                Options
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 ml-1">
                    <path fill-rule="evenodd"
                          d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                          clip-rule="evenodd"></path>
                </svg>
            </x-dropdown-button>
        </x-slot:trigger>

        <x-dropdown-item href="/view">View</x-dropdown-item>
        <x-dropdown-item href="/edit">Edit</x-dropdown-item>
        <x-dropdown-item onclick="confirm('Delete?')">Delete</x-dropdown-item>
    </x-dropdown>

    <div x-data="{ open: false }">
        <button @click="open = true">
            Refund payment
        </button>


        <x-alert size="5xl">
            <x-alert-title>Are you sure you want to refund this payment?</x-alert-title>
            <x-alert-description>
                The refund will be reflected in the customer's bank account 2 to 3 business days after processing.
            </x-alert-description>
            <x-input/>
            <x-alert-actions>
                <x-button plain @click="showAlert = false">
                    Cancel
                </x-button>
                <x-button @click="showAlert = false">
                    Refund
                </x-button>
            </x-alert-actions>
        </x-alert>
    </div>

    {{-- Basic usage --}}
    <x-textarea aria-label="Description" name="description" />

    {{-- With Label--}}
    <x-field>
        <x-label>Description</x-label>
        <x-textarea name="description" />
    </x-field>
    {{-- With Description --}}
    <x-field>
        <x-label>Description</x-label>
        <x-description>This will be shown under the product title.</x-description>
        <x-textarea name="description" />
    </x-field>
    {{-- Disabled State--}}
    <x-field disabled>
        <x-label>Description</x-label>
        <x-textarea name="description" disabled />
    </x-field>
    {{-- Validation Errors --}}
    <x-field>
        <x-label>Description</x-label>
        <x-textarea name="description" :invalid="$errors->has('description')" />
        @error('description')
        <x-error-message>{{ $message }}</x-error-message>
        @enderror
    </x-field>

    {{-- With Custom Rows --}}
    <x-textarea name="description" rows="5" />

    {{-- Non-Resizable --}}
    <x-textarea name="description" :resizable="false" />

    {{-- Description --}}
    <x-description-list>
        <x-description-term>Customer</x-description-term>
        <x-description-details>Leslie Alexander</x-description-details>

        <x-description-term>Email</x-description-term>
        <x-description-details>leslie.alexander@example.com</x-description-details>

        <x-description-term>Access</x-description-term>
        <x-description-details>Admin</x-description-details>

        <x-description-term>Profession</x-description-term>
        <x-description-details>Full Stack Developer</x-description-details>
    </x-description-list>

    {{-- Dialog --}}
    <div x-data="{ open: false }">
        <button @click="open = true">View Terms</button>

        <x-dialog size="sm">
            <x-dialog-title>Terms and Conditions</x-dialog-title>
            <x-dialog-description>
                Please agree to the following terms and conditions to continue.
            </x-dialog-description>

            <x-dialog-body class="max-h-96 overflow-y-auto text-sm/6 text-zinc-900 dark:text-white">
                <p class="mt-4">
                    By accessing and using our services, you are agreeing to these terms...
                </p>
                <h3 class="mt-6 font-bold">Comprehensive Acceptance of Terms</h3>
                <p class="mt-4">
                    Your engagement with our application signifies your irrevocable acceptance...
                </p>
                {{-- More content --}}
            </x-dialog-body>

            <x-dialog-actions>
                <button @click="open = false">Decline</button>
                <button @click="open = false">Accept</button>
            </x-dialog-actions>
        </x-dialog>
    </div>

    {{-- Checkbox --}}
    <div class="space-x-2">
        <x-checkbox name="allow_embedding" color="orange" aria-label="Allow embedding" />
        <x-checkbox color="sky" :checked="true" />
        <x-checkbox color="red" :checked="true" />
        <x-checkbox color="green" :checked="true" />
        <x-checkbox color="purple" :checked="true" />
    </div>

    <x-checkbox-group class="w-full">
        <x-checkbox-field>
            <x-checkbox name="show_on_events_page" :checked="true" />
            <x-label>Show on events page</x-label>
            <x-description class="col-span-full">Make this event visible on your profile.</x-description>
        </x-checkbox-field>

        <x-checkbox-field>
            <x-checkbox name="allow_embedding" />
            <x-label>Allow embedding</x-label>
            <x-description class="col-span-full">Allow others to embed your event details on their own site.</x-description>
        </x-checkbox-field>
    </x-checkbox-group>

    {{-- Table --}}
    @php
        $users = [
            (object) [
                'id' => 1,
                'name' => 'Leslie Alexander',
                'email' => 'leslie.alexander@example.com',
                'handle' => 'lesliealexander',
                'role' => 'Co-Founder / CEO',
                'access' => 'Admin',
                'online' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            ],
            (object) [
                'id' => 2,
                'name' => 'Michael Foster',
                'email' => 'michael.foster@example.com',
                'handle' => 'michaelfoster',
                'role' => 'Co-Founder / CTO',
                'access' => 'Owner',
                'online' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            ],
            (object) [
                'id' => 3,
                'name' => 'Dries Vincent',
                'email' => 'dries.vincent@example.com',
                'handle' => 'driesvincent',
                'role' => 'Business Relations',
                'access' => 'Member',
                'online' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            ],
            (object) [
                'id' => 4,
                'name' => 'Lindsay Walton',
                'email' => 'lindsay.walton@example.com',
                'handle' => 'lindsaywalton',
                'role' => 'Front-end Developer',
                'access' => 'Member',
                'online' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            ],
            (object) [
                'id' => 5,
                'name' => 'Courtney Henry',
                'email' => 'courtney.henry@example.com',
                'handle' => 'courtneyhenry',
                'role' => 'Designer',
                'access' => 'Admin',
                'online' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            ],
        ];
    @endphp

    <div class="p-6 sm:p-8">
        <h1 class="mb-6 text-lg font-semibold text-zinc-950 dark:text-white">Team Members</h1>

        <x-table dense="true" grid="true" striped="true" bleed="true" class="[--gutter:--spacing(6)] sm:[--gutter:--spacing(8)]">
            <x-table-head>
                <x-table-row>
                    <x-table-header>Name</x-table-header>
                    <x-table-header>Role</x-table-header>
                    <x-table-header>Status</x-table-header>
                    <x-table-header class="relative w-0">
                        <span class="sr-only">Actions</span>
                    </x-table-header>
                </x-table-row>
            </x-table-head>
            <x-table-body>
                @foreach($users as $user)
                    <x-table-row>
                        {{-- Name with Avatar --}}
                        <x-table-cell>
                            <div class="flex items-center gap-4">
                            <span class="size-12 inline-grid shrink-0 align-middle rounded-full outline -outline-offset-1 outline-black/10 dark:outline-white/10 overflow-hidden">
                                <img
                                    class="size-full object-cover"
                                    src="{{ $user->avatar_url }}"
                                    alt="{{ $user->name }}"
                                >
                            </span>
                                <div>
                                    <div class="font-medium">{{ $user->name }}</div>
                                    <div class="text-zinc-500">
                                        <a href="mailto:{{ $user->email }}" class="hover:text-zinc-700 dark:hover:text-zinc-300">
                                            {{ $user->email }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </x-table-cell>

                        {{-- Access Level --}}
                        <x-table-cell class="text-zinc-500">
                            {{ $user->access }}
                        </x-table-cell>

                        {{-- Online Status Badge --}}
                        <x-table-cell>
                            @if($user->online)
                                <span class="inline-flex items-center gap-x-1.5 rounded-md px-1.5 py-0.5 text-sm/5 font-medium sm:text-xs/5 bg-lime-400/20 text-lime-700 dark:bg-lime-400/10 dark:text-lime-300">
                                Online
                            </span>
                            @else
                                <span class="inline-flex items-center gap-x-1.5 rounded-md px-1.5 py-0.5 text-sm/5 font-medium sm:text-xs/5 bg-zinc-600/10 text-zinc-700 dark:bg-white/5 dark:text-zinc-400">
                                Offline
                            </span>
                            @endif
                        </x-table-cell>

                        {{-- Actions Dropdown --}}
                        <x-table-cell>
                            <div class="-mx-3 -my-1.5 sm:-mx-2.5">
                                <button
                                    type="button"
                                    class="relative inline-flex items-center justify-center rounded-lg p-2 text-zinc-500 hover:bg-zinc-950/5 hover:text-zinc-700 dark:hover:bg-white/10 dark:hover:text-zinc-300"
                                    aria-label="More options"
                                >
                                    <svg class="size-5" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M2 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM6.5 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM12.5 6.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/>
                                    </svg>
                                </button>
                            </div>
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>

    {{-- Pagination --}}
    <div class="max-w-[400px]">
        <x-pagination>
            <x-pagination-previous/>
            <x-pagination-next href="?page=2"/>
        </x-pagination>

        <x-pagination>
            <x-pagination-previous href="?page=1" />
            <x-pagination-list>
                <x-pagination-page href="?page=1">1</x-pagination-page>
                <x-pagination-page href="?page=2">2</x-pagination-page>
                <x-pagination-page href="?page=3" current>3</x-pagination-page>
                <x-pagination-page href="?page=4">4</x-pagination-page>
                <x-pagination-gap />
                <x-pagination-page href="?page=65">65</x-pagination-page>
                <x-pagination-page href="?page=66">66</x-pagination-page>
            </x-pagination-list>
            <x-pagination-next href="?page=4">Next</x-pagination-next>
        </x-pagination>
    </div>

    {{-- Pagination --}}
    @if($products->hasPages())
        <x-pagination>
            <x-pagination-previous :href="$products->previousPageUrl()" />

            <x-pagination-list>
                @php
                    $current = $products->currentPage();
                    $last = $products->lastPage();
                    $start = max(1, $current - 2);
                    $end = min($last, $current + 2);
                @endphp

                @for($page = $start; $page <= $end; $page++)
                    <x-pagination-page
                        :href="$products->url($page)"
                        :current="$page === $current"
                    >
                        {{ $page }}
                    </x-pagination-page>
                @endfor

                @if($end < $last)
                    <x-pagination-gap />
                    <x-pagination-page :href="$products->url($last)">
                        {{ $last }}
                    </x-pagination-page>
                @endif
            </x-pagination-list>

            <x-pagination-next :href="$products->nextPageUrl()" />
        </x-pagination>
    @endif


</div>

/*
if (this.disabled) {
this.$el.querySelectorAll('[data-description], [data-error], label').forEach(el => {
el.setAttribute('data-disabled', '');
});
}

// Watch for disabled changes
this.$watch('disabled', value => {
// Update form inputs
this.$el.querySelectorAll('input, textarea, select').forEach(el => {
value ? el.setAttribute('disabled', '') : el.removeAttribute('disabled');
});

// Update visual elements
this.$el.querySelectorAll('[data-description], [data-error], label').forEach(el => {
value ? el.setAttribute('data-disabled', '') : el.removeAttribute('data-disabled');
});
});*/
