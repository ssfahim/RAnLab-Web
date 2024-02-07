<x-app-layout>
    <x-slot name="header">
        {{ __('Profile') }}
    </x-slot>

    <div class="profile_page profile_section">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="password_update_page profile_section">
        @include('profile.partials.update-password-form')
    </div>

    <div class="delete_account_page profile_section">
        @include('profile.partials.delete-user-form')
    </div>
    
</x-app-layout>
