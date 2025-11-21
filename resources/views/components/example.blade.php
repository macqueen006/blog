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
