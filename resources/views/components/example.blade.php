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

    <div x-data="{ showAlert: false }">
        <button @click="showAlert = true">
            Refund payment
        </button>


        <x-alert x-model="showAlert" size="5xl">
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
</div>
