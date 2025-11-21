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

    {{--  --}}

    <div class="" x-data="{ fieldId: 'field-6920158d5dc15', disabled: false, invalid: false }" x-init="
        $watch('disabled', value =&gt; {
            $el.querySelectorAll('input, textarea, select').forEach(el =&gt; {
                value ? el.setAttribute('disabled', '') : el.removeAttribute('disabled');
            });
        });

        // Set IDs and ARIA attributes immediately
        const label = $el.querySelector('label');
        const input = $el.querySelector('input, textarea, select');
        const description = $el.querySelector('[data-description]');
        const error = $el.querySelector('[data-error]');

        if (label &amp;&amp; input) {
            const inputId = fieldId + '-input';
            label.setAttribute('for', inputId);
            input.setAttribute('id', inputId);

            if (description) {
                const descId = fieldId + '-description';
                description.setAttribute('id', descId);
                input.setAttribute('aria-describedby', descId);
            }

            if (error) {
                const errorId = fieldId + '-error';
                error.setAttribute('id', errorId);
                if (invalid) input.setAttribute('aria-errormessage', errorId);
            }
        }
    ">
        <label class="select-none text-base/6 text-zinc-950 data-[disabled]:opacity-50 sm:text-sm/6 dark:text-white" for="field-6920158d5dc15-input">
            Name
        </label>
        <span class="relative block w-full before:absolute before:inset-px before:rounded-md before:bg-white before:shadow-sm dark:before:hidden after:pointer-events-none after:absolute after:inset-0 after:rounded-sm after:ring-transparent after:ring-inset sm:focus-within:after:ring focus-within:after:ring focus-within:after:ring-blue-500">
    <input type="text" name="email" disabled="" title="Field currently disabled" class="block w-full appearance-none rounded-md px-[calc(0.75rem-1px)] py-[calc(0.375rem-1px)] text-sm/6 text-zinc-950 placeholder:text-zinc-500 dark:text-white dark:placeholder:text-zinc-400 border border-zinc-950/10 hover:border-zinc-950/20 dark:border-white/10 dark:hover:border-white/20 bg-transparent dark:bg-white/5 focus:outline-none focus:outline focus:outline focus:outline-offset focus:outline-blue-500 disabled:opacity-60 disabled:cursor-not-allowed disabled:bg-zinc-100 dark:disabled:bg-zinc-900 disabled:text-zinc-500 dark:disabled:text-zinc-500 disabled:border-zinc-200 dark:disabled:border-zinc-800" placeholder="Na Name" id="field-6920158d5dc15-input">
</span>
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
