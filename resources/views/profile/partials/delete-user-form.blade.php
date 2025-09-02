<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-red-50 border border-red-200 rounded-lg">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-red-900 mb-4">
            {{ __('Are you sure you want to delete your account?') }}
        </h2>

        <p class="text-sm text-red-700 mb-6">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>

        <div class="mb-6">
            <x-forms.input-label for="password" value="{{ __('Password') }}" />

            <x-forms.text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                placeholder="{{ __('Password') }}"
                required
            />

            <x-forms.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end space-x-3">
            <x-buttons.secondary-button type="button" onclick="history.back()">
                {{ __('Cancel') }}
            </x-buttons.secondary-button>

            <x-buttons.danger-button type="submit">
                {{ __('Delete Account') }}
            </x-buttons.danger-button>
        </div>
    </form>
</section>
