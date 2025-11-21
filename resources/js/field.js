document.addEventListener('alpine:init', () => {
    Alpine.data('field', (fieldId, disabled = false) => ({
        fieldId,
        disabled,
        invalid: false,

        init() {
            // Only watch disabled if there are form elements
            const formElements = this.$el.querySelectorAll('input, textarea, select');
            if (formElements.length > 0) {
                this.$watch('disabled', value => {
                    formElements.forEach(el => {
                        value ? el.setAttribute('disabled', '') : el.removeAttribute('disabled');
                    });
                });
            }

            // Get elements once
            const label = this.$el.querySelector('label');
            const input = this.$el.querySelector('input, textarea, select');

            // Early return if no input found
            if (!input) return;

            // Set input ID
            const inputId = this.fieldId + '-input';
            input.setAttribute('id', inputId);

            // Link label only if it exists
            if (label) {
                label.setAttribute('for', inputId);
            }

            // Link description only if it exists
            const description = this.$el.querySelector('[data-description]');
            if (description) {
                const descId = this.fieldId + '-description';
                description.setAttribute('id', descId);
                input.setAttribute('aria-describedby', descId);
            }

            // Link error only if it exists
            const error = this.$el.querySelector('[data-error]');
            if (error) {
                const errorId = this.fieldId + '-error';
                error.setAttribute('id', errorId);
                // Only set aria-errormessage if invalid
                if (this.invalid) {
                    input.setAttribute('aria-errormessage', errorId);
                }
            }
        }
    }));
});
